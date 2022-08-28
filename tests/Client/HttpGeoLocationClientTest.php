<?php

namespace AppTest\Client;

use App\Client\HttpGeoLocationClient;
use App\DTO\GeoLocation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpGeoLocationClientTest extends KernelTestCase
{
    private const TEST_IP = '212.114.206.213';

    public function testGetGeoLocation()
    {
        self::bootKernel();

        $geoLocationClient = new HttpGeoLocationClient(
            $this->getHttpClientMock(),
            $this->getSerializer(),
        );

        $result = $geoLocationClient->getGeoLocation(self::TEST_IP);

        $this->assertEquals($this->getExpectedObject(), $result);
    }

    protected function getHttpClientMock(): HttpClientInterface
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getContent')
            ->willReturn(file_get_contents(__DIR__ . '/../resources/geo-location.json'));

        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('request')
            ->with('GET', sprintf(HttpGeoLocationClient::REQUEST_TEMPLATE, self::TEST_IP))
            ->willReturn($response);

        return $httpClient;
    }

    protected function getSerializer(): SerializerInterface
    {
        $container = static::getContainer();

        return $container->get(SerializerInterface::class);
    }

    protected function getExpectedObject(): GeoLocation
    {
        return (new GeoLocation())
            ->setStatus('success')
            ->setCountry('Germany')
            ->setCountryCode('DE')
            ->setRegion('BY')
            ->setRegionName('Bavaria')
            ->setCity('Munich')
            ->setZip('80331')
            ->setLat('48.1728')
            ->setLon('11.5317')
            ->setTimezone('Europe/Berlin')
            ->setIsp('M-net Telekommunikations GmbH')
            ->setOrg('M-net Telekommunikations GmbH')
            ->setAs('AS8767 M-net Telekommunikations GmbH')
            ->setQuery('212.114.206.213')
        ;
    }
}
