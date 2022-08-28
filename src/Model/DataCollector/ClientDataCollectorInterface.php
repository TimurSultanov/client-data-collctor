<?php

namespace App\Model\DataCollector;

use App\DTO\ProcessingStatsCollection;

interface ClientDataCollectorInterface
{
    /**
     * @return \App\DTO\ProcessingStatsCollection
     */
    public function collect(): ProcessingStatsCollection;
}
