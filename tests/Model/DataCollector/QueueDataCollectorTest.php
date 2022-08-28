<?php

namespace AppTest\Model\DataCollector;

use App\Client\GeoLocationClientInterface;
use App\Client\HttpGeoLocationClient;
use App\Client\QueueClientInterface;
use App\Client\StorageClientInterface;
use App\DTO\ProcessingStats;
use App\DTO\ProcessingStatsCollection;
use App\Model\DataCollector\QueueDataCollector;
use App\Model\DataExpander\ClientInfoDataExpander;
use App\Model\DataExpander\GeoLocationDataExpander;
use App\Model\DataExpander\UserAgentDataExpander;
use App\Model\Reader\ClientInfoReader;
use App\Model\Reader\ClientInfoReaderInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class QueueDataCollectorTest extends KernelTestCase
{
    private const SUBSCRIPTION_NAME = 'subscription_name';
    private const TOPIC_NAME = 'topic_name';
    private const TEST_CLIENT_ID = 1234;

    public function testCollect()
    {
        self::bootKernel();

        $queueDataCollector = new QueueDataCollector(
            $this->mockQueueClient(),
            $this->mockStorageClient(),
            $this->getSerializer(),
            $this->getExpanders(),
            self::SUBSCRIPTION_NAME,
            self::TOPIC_NAME
        );

        $processingStatsCollection = $queueDataCollector->collect();

        $this->assertEquals($this->getExpectedStatsCollection(), $processingStatsCollection);
    }

    protected function getExpectedStatsCollection(): ProcessingStatsCollection
    {
        $processingStats = (new ProcessingStats())
            ->setNumRuns(1)
            ->setClientId(self::TEST_CLIENT_ID);

        return (new ProcessingStatsCollection())->setProcessingStats([$processingStats]);
    }

    protected function mockQueueClient(): QueueClientInterface
    {
        $queueClientMock = $this->createMock(QueueClientInterface::class);
        $queueClientMock->method('pull')
            ->with(self::SUBSCRIPTION_NAME)
            ->willReturn($this->getMessageGenerator());

        $queueClientMock->method('publish')
            ->with(
                self::TOPIC_NAME,
                $this->callback(function (string $argument) {
                    $expectedJson = file_get_contents(__DIR__ . '/../../resources/parsed-data.json');

                    $this->assertEquals(json_decode($expectedJson, true), json_decode($argument, true));

                    return true;
                })
            );

        return $queueClientMock;
    }

    protected function getMessageGenerator(): \Generator
    {
        yield file_get_contents(__DIR__ . '/../../resources/payload.json');
    }

    protected function mockStorageClient(): StorageClientInterface
    {
        $storageClientMock = $this->createMock(StorageClientInterface::class);
        $storageClientMock->method('set')
            ->with(
                sprintf(QueueDataCollector::CLIENT_DATA_KEY_TEMPLATE, self::TEST_CLIENT_ID),
                $this->callback(function (string $argument) {
                    $expectedJson = file_get_contents(__DIR__ . '/../../resources/parsed-data.json');

                    $this->assertEquals(json_decode($expectedJson, true), json_decode($argument,true));

                    return true;
                })
            );

        return $storageClientMock;
    }

    protected function getSerializer(): SerializerInterface
    {
        $container = static::getContainer();

        return $container->get(SerializerInterface::class);
    }

    protected function getExpanders(): array
    {
        return [
            new ClientInfoDataExpander($this->getClientInfoReader()),
            new GeoLocationDataExpander($this->createGeoLocationClient()),
            new UserAgentDataExpander(),
        ];
    }

    protected function getClientInfoReader(): ClientInfoReaderInterface
    {
        $storageClient = $this->createMock(StorageClientInterface::class);
        $storageClient->method('get')
            ->with(sprintf(ClientInfoReader::KEY_TEMPLATE, self::TEST_CLIENT_ID))
            ->willReturn(file_get_contents(__DIR__ . '/../../resources/client-info.json'));

        return new ClientInfoReader($storageClient, $this->getSerializer());
    }

    protected function createGeoLocationClient(): GeoLocationClientInterface
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getContent')
            ->willReturn(file_get_contents(__DIR__ . '/../../resources/geo-location.json'));

        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('request')
            ->willReturn($response);

        return new HttpGeoLocationClient($httpClient, $this->getSerializer());
    }
}
