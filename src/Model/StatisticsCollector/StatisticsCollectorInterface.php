<?php

namespace App\Model\StatisticsCollector;

use App\DTO\ProcessingStatsCollection;

interface StatisticsCollectorInterface
{
    /**
     * @param \App\DTO\ProcessingStatsCollection $processingStatsCollection
     *
     * @return void
     */
    public function saveData(ProcessingStatsCollection $processingStatsCollection): void;
}
