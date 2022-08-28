<?php

namespace App\DTO;

class ProcessingStatsCollection
{
    /**
     * @var array<\App\DTO\ProcessingStats>
     */
    private array $processingStats = [];

    /**
     * @return array
     */
    public function getProcessingStats(): array
    {
        return $this->processingStats;
    }

    /**
     * @param array $processingStats
     *
     * @return \App\DTO\ProcessingStatsCollection
     */
    public function setProcessingStats(array $processingStats): self
    {
        $this->processingStats = $processingStats;

        return $this;
    }

    /**
     * @param \App\DTO\ProcessingStats $processingStats
     *
     * @return $this
     */
    public function addProcessingStats(ProcessingStats $processingStats): self
    {
        $this->processingStats[] = $processingStats;

        return $this;
    }
}
