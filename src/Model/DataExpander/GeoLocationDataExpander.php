<?php

namespace App\Model\DataExpander;

use App\Client\GeoLocationClientInterface;
use App\DTO\Client;

class GeoLocationDataExpander implements ClientDataExpanderInterface
{
    /**
     * @var \App\Client\GeoLocationClientInterface
     */
    private GeoLocationClientInterface $geoLocationClient;

    /**
     * @param \App\Client\GeoLocationClientInterface $geoLocationClient
     */
    public function __construct(GeoLocationClientInterface $geoLocationClient)
    {
        $this->geoLocationClient = $geoLocationClient;
    }

    /**
     * @param \App\DTO\Client $clientDto
     *
     * @return \App\DTO\Client
     */
    public function expand(Client $clientDto): Client
    {
        $geoLocationDto = $this->geoLocationClient->getGeoLocation($clientDto->getIp());

        return $clientDto->setGeoLocation($geoLocationDto);
    }
}
