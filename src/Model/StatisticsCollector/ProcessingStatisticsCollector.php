<?php

namespace App\Model\StatisticsCollector;

use App\Client\StorageClientInterface;
use App\DTO\ProcessingStatsCollection;

class ProcessingStatisticsCollector implements StatisticsCollectorInterface
{
    public const RUN_STAT_KEY = 'stats:num_runs:total';

    public const PROCESSED_STAT_KEY = 'stats:processed:total';

    public const PROCESSED_STAT_PER_CLIENT_KEY_TEMPLATE = 'stats:processed:client:%d';

    /**
     * @var \App\Client\StorageClientInterface
     */
    private StorageClientInterface $storageClient;

    /**
     * @param \App\Client\StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @param \App\DTO\ProcessingStatsCollection $processingStatsCollection
     *
     * @return void
     */
    public function saveData(ProcessingStatsCollection $processingStatsCollection): void
    {
        $totalRuns = (int)$this->storageClient->get(self::RUN_STAT_KEY);
        ++$totalRuns;
        $totalProcessed = (int)$this->storageClient->get(self::PROCESSED_STAT_KEY);

        foreach ($processingStatsCollection->getProcessingStats() as $processingStats) {
            $storageKey = sprintf(self::PROCESSED_STAT_PER_CLIENT_KEY_TEMPLATE, $processingStats->getClientId());

            $processedByClient = (int)$this->storageClient->get($storageKey) + $processingStats->getNumRuns();
            $totalProcessed += $processingStats->getNumRuns();

            $this->storageClient->set($storageKey, (string)$processedByClient);
        }

        $this->storageClient->set(self::RUN_STAT_KEY, (string)$totalRuns);
        $this->storageClient->set(self::PROCESSED_STAT_KEY, (string)$totalProcessed);
    }
}
