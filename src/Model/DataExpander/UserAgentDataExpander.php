<?php

namespace App\Model\DataExpander;

use App\DTO\Client;
use WhichBrowser\Parser;

class UserAgentDataExpander implements ClientDataExpanderInterface
{
    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return \App\DTO\Client
     */
    public function expand(Client $clientDto): Client
    {
        $parser = new Parser($clientDto->getBrowser());

        return $clientDto->setBrowserName($parser->browser->getName())
            ->setOs($parser->os->getName())
            ->setDeviceType($parser->device->type)
        ;
    }
}
