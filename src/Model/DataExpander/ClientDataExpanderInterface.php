<?php

namespace App\Model\DataExpander;

use App\DTO\Client;

interface ClientDataExpanderInterface
{
    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return \App\DTO\Client
     */
    public function expand(Client $clientDto): Client;
}
