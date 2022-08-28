<?php

namespace AppTest\Model\StatisticsCollector;

use App\Client\StorageClientInterface;
use App\DTO\ProcessingStats;
use App\DTO\ProcessingStatsCollection;
use App\Model\StatisticsCollector\ProcessingStatisticsCollector;
use PHPUnit\Framework\TestCase;

class ProcessingStatisticsCollectorTest extends TestCase
{
    private const TEST_CLIENT_ID = 1234;

    public function testSaveData(): void
    {
        $processingStatisticsCollector = new ProcessingStatisticsCollector($this->mockStorageClient());

        $processingStatisticsCollector->saveData($this->getStatsCollection());

        $this->assertTrue(true, 'Check mockStorageClient for asserts');
    }

    protected function mockStorageClient(): StorageClientInterface
    {
        $storageClientMock = $this->createMock(StorageClientInterface::class);
        $storageClientMock->method('get')
            ->withConsecutive(
                    [ProcessingStatisticsCollector::RUN_STAT_KEY],
                    [ProcessingStatisticsCollector::PROCESSED_STAT_KEY],
                    [sprintf(ProcessingStatisticsCollector::PROCESSED_STAT_PER_CLIENT_KEY_TEMPLATE, self::TEST_CLIENT_ID)]
            )->willReturnOnConsecutiveCalls('11', '4', '2');

        $storageClientMock->method('set')
            ->withConsecutive(
                [sprintf(ProcessingStatisticsCollector::PROCESSED_STAT_PER_CLIENT_KEY_TEMPLATE, self::TEST_CLIENT_ID), '3'],
                [ProcessingStatisticsCollector::RUN_STAT_KEY, '12'],
                [ProcessingStatisticsCollector::PROCESSED_STAT_KEY, '5']
            );

        return $storageClientMock;
    }

    protected function getStatsCollection(): ProcessingStatsCollection
    {
        $processingStats = (new ProcessingStats())
            ->setNumRuns(1)
            ->setClientId(self::TEST_CLIENT_ID);

        return (new ProcessingStatsCollection())->setProcessingStats([$processingStats]);
    }
}
