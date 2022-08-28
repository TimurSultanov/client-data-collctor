<?php

namespace App\Model\DataCollector;

use App\Client\QueueClientInterface;
use App\Client\StorageClientInterface;
use App\DTO\Client;
use App\DTO\ProcessingStats;
use App\DTO\ProcessingStatsCollection;
use Symfony\Component\Serializer\SerializerInterface;

class QueueDataCollector implements ClientDataCollectorInterface
{
    public const CLIENT_DATA_KEY_TEMPLATE = 'client_data:%d';

    /**
     * @var array<\App\Model\DataExpander\ClientDataExpanderInterface>
     */
    private array $expanders;

    private QueueClientInterface $queue;

    private StorageClientInterface $storage;

    private string $subscriptionName;

    private string $topicName;

    /**
     * @var array<\App\DTO\ProcessingStats>
     */
    private array $processingStats;

    /**
     * @var \Symfony\Component\Serializer\SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @param \App\Client\QueueClientInterface $queue
     * @param \App\Client\StorageClientInterface $storage
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     * @param array<\App\Model\DataExpander\ClientDataExpanderInterface> $expanders
     * @param string $subscriptionName
     * @param string $topicName
     */
    public function __construct(
        QueueClientInterface $queue,
        StorageClientInterface $storage,
        SerializerInterface $serializer,
        array $expanders,
        string $subscriptionName,
        string $topicName
    ) {
        $this->expanders = $expanders;
        $this->queue = $queue;
        $this->storage = $storage;
        $this->subscriptionName = $subscriptionName;
        $this->topicName = $topicName;
        $this->serializer = $serializer;
    }

    /**
     * @return \App\DTO\ProcessingStatsCollection
     */
    public function collect(): ProcessingStatsCollection
    {
        foreach ($this->queue->pull($this->subscriptionName) as $message) {
            $clientDto = $this->serializer->deserialize($message, Client::class, 'json');
            $clientDto = $this->expandClientData($clientDto);

            $this->saveClientData($clientDto);
            $this->addStatistics($clientDto->getClientId());
        }

        return (new ProcessingStatsCollection())
            ->setProcessingStats(array_values($this->processingStats));
    }

    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return \App\DTO\Client
     */
    protected function expandClientData(Client $clientDto): Client
    {
        foreach ($this->expanders as $expander) {
            $clientDto = $expander->expand($clientDto);
        }

        return $clientDto;
    }

    /**
     * @param int $clientId
     *
     * @return void
     */
    protected function addStatistics(int $clientId): void
    {
        if (!isset($this->processingStats[$clientId])) {
            $this->processingStats[$clientId] = (new ProcessingStats())
                ->setClientId($clientId)
                ->setNumRuns(0);
        }

        $numRuns = $this->processingStats[$clientId]->getNumRuns();

        $this->processingStats[$clientId]->setNumRuns(++$numRuns);
    }

    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return void
     */
    protected function saveClientData(Client $clientDto): void
    {
        $serializedClientData = $this->serializer->serialize($clientDto, 'json');

        $this->queue->publish($this->topicName, $serializedClientData);
        $this->storage->set(sprintf(self::CLIENT_DATA_KEY_TEMPLATE, $clientDto->getClientId()), $serializedClientData);
    }
}
