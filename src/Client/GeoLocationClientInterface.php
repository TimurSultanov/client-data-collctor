<?php

namespace App\Client;

use App\DTO\GeoLocation;

interface GeoLocationClientInterface
{
    /**
     * @param string $api
     *
     * @return \App\DTO\GeoLocation
     */
    public function getGeoLocation(string $api): GeoLocation;
}
