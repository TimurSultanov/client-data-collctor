<?php

namespace App\DTO;

class GeoLocation
{
    private string $status;

    private string $country;

    private string $countryCode;

    private string $region;

    private string $regionName;

    private string $city;

    private string $zip;

    private float $lat;

    private float $lon;

    private string $timezone;

    private string $isp;

    private string $org;

    private string $as;

    private string $query;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return \App\DTO\GeoLocation
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return \App\DTO\GeoLocation
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return \App\DTO\GeoLocation
     */
    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     *
     * @return \App\DTO\GeoLocation
     */
    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegionName(): string
    {
        return $this->regionName;
    }

    /**
     * @param string $regionName
     *
     * @return \App\DTO\GeoLocation
     */
    public function setRegionName(string $regionName): self
    {
        $this->regionName = $regionName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return \App\DTO\GeoLocation
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     *
     * @return \App\DTO\GeoLocation
     */
    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     *
     * @return \App\DTO\GeoLocation
     */
    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     *
     * @return \App\DTO\GeoLocation
     */
    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     *
     * @return \App\DTO\GeoLocation
     */
    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsp(): string
    {
        return $this->isp;
    }

    /**
     * @param string $isp
     *
     * @return \App\DTO\GeoLocation
     */
    public function setIsp(string $isp): self
    {
        $this->isp = $isp;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrg(): string
    {
        return $this->org;
    }

    /**
     * @param string $org
     *
     * @return \App\DTO\GeoLocation
     */
    public function setOrg(string $org): self
    {
        $this->org = $org;

        return $this;
    }

    /**
     * @return string
     */
    public function getAs(): string
    {
        return $this->as;
    }

    /**
     * @param string $as
     *
     * @return \App\DTO\GeoLocation
     */
    public function setAs(string $as): self
    {
        $this->as = $as;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return \App\DTO\GeoLocation
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }
}
