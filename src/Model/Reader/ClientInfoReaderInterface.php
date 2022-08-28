<?php

namespace App\Model\Reader;

use App\DTO\ClientInfo;

interface ClientInfoReaderInterface
{
    /**
     * @param int $clientId
     *
     * @return \App\DTO\ClientInfo
     */
    public function getClientById(int $clientId): ClientInfo;
}
