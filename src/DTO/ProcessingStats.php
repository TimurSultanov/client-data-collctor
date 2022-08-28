<?php

namespace App\DTO;

class ProcessingStats
{
    private int $numRuns = 0;

    private int $clientId;

    /**
     * @return int
     */
    public function getNumRuns(): int
    {
        return $this->numRuns;
    }

    /**
     * @param int $numRuns
     *
     * @return \App\DTO\ProcessingStats
     */
    public function setNumRuns(int $numRuns): self
    {
        $this->numRuns = $numRuns;

        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     *
     * @return \App\DTO\ProcessingStats
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }
}
