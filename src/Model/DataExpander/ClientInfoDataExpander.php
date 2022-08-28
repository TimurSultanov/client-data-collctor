<?php

namespace App\Model\DataExpander;

use App\DTO\Client;
use App\Model\Reader\ClientInfoReaderInterface;

class ClientInfoDataExpander implements ClientDataExpanderInterface
{
    /**
     * @var \App\Model\Reader\ClientInfoReaderInterface
     */
    private ClientInfoReaderInterface $clientInfoReader;

    /**
     * @param \App\Model\Reader\ClientInfoReaderInterface $clientInfoReader
     */
    public function __construct(ClientInfoReaderInterface $clientInfoReader)
    {
        $this->clientInfoReader = $clientInfoReader;
    }

    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return \App\DTO\Client
     */
    public function expand(Client $clientDto): Client
    {
        $clientInfoDto = $this->clientInfoReader->getClientById($clientDto->getClientId());

        return $clientDto->setClientInfo($clientInfoDto);
    }
}
