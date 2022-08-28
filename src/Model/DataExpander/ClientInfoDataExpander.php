<?php

namespace App\Model\DataExpander;

use App\Client\ClientInfoClientInterface;
use App\DTO\Client;

class ClientInfoDataExpander implements ClientDataExpanderInterface
{
    /**
     * @var \App\Client\ClientInfoClientInterface
     */
    private ClientInfoClientInterface $clientInfoClient;

    /**
     * @param \App\Client\ClientInfoClientInterface $clientInfoClient
     */
    public function __construct(ClientInfoClientInterface $clientInfoClient)
    {
        $this->clientInfoClient = $clientInfoClient;
    }

    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return \App\DTO\Client
     */
    public function expand(Client $clientDto): Client
    {
        $clientInfoDto = $this->clientInfoClient->getClientById($clientDto->getClientId());

        return $clientDto->setClientInfo($clientInfoDto);
    }
}
