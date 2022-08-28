<?php

namespace App\DTO;

class ClientInfo
{
    private string $clientName;

    private int $clientId;

    private string $vertical;

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * @param string $clientName
     *
     * @return \App\DTO\ClientInfo
     */
    public function setClientName(string $clientName): self
    {
        $this->clientName = $clientName;

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
     * @return \App\DTO\ClientInfo
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getVertical(): string
    {
        return $this->vertical;
    }

    /**
     * @param string $vertical
     *
     * @return \App\DTO\ClientInfo
     */
    public function setVertical(string $vertical): self
    {
        $this->vertical = $vertical;

        return $this;
    }
}
