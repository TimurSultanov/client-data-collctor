<?php

namespace App\Client;

use App\DTO\GeoLocation;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpGeoLocationClient implements GeoLocationClientInterface
{
    public const REQUEST_TEMPLATE = 'http://ip-api.com/json/%s';

    /**
     * @var \Symfony\Contracts\HttpClient\HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @var \Symfony\Component\Serializer\SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @param \Symfony\Contracts\HttpClient\HttpClientInterface $httpClient
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer)
    {
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    /**
     * @param string $ip
     *
     * @return \App\DTO\GeoLocation
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getGeoLocation(string $ip): GeoLocation
    {
        $response = $this->httpClient->request(
            'GET',
            sprintf(self::REQUEST_TEMPLATE, $ip)
        );

        return $this->serializer->deserialize($response->getContent(), GeoLocation::class, 'json');
    }
}
