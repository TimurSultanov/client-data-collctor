<?php

namespace App\DTO;

class Client
{
    private string $channel;

    private int $clientId;

    private string $clickType;

    private string $pg;

    private string $url;

    private string $browser;

    private Navigator $navigator;

    private Screen $screen;

    private string $protocol;

    private string $rand;

    private string $userId;

    private string $ip;

    private int $sessionId;

    private GeoLocation $geoLocation;

    private ClientInfo $clientInfo;

    private string $os;

    private string $browserName;

    private string $deviceType;

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     *
     * @return \App\DTO\Client
     */
    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     *
     * @return \App\DTO\Client
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getClickType(): string
    {
        return $this->clickType;
    }

    /**
     * @param string $clickType
     *
     * @return \App\DTO\Client
     */
    public function setClickType(string $clickType): self
    {
        $this->clickType = $clickType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPg(): string
    {
        return $this->pg;
    }

    /**
     * @param string $pg
     *
     * @return \App\DTO\Client
     */
    public function setPg(string $pg): self
    {
        $this->pg = $pg;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return \App\DTO\Client
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrowser(): string
    {
        return $this->browser;
    }

    /**
     * @param string $browser
     *
     * @return \App\DTO\Client
     */
    public function setBrowser(string $browser): self
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * @return \App\DTO\Navigator
     */
    public function getNavigator(): Navigator
    {
        return $this->navigator;
    }

    /**
     * @param \App\DTO\Navigator $navigator
     *
     * @return \App\DTO\Client
     */
    public function setNavigator(Navigator $navigator): self
    {
        $this->navigator = $navigator;

        return $this;
    }

    /**
     * @return \App\DTO\Screen
     */
    public function getScreen(): Screen
    {
        return $this->screen;
    }

    /**
     * @param \App\DTO\Screen $screen
     *
     * @return \App\DTO\Client
     */
    public function setScreen(Screen $screen): self
    {
        $this->screen = $screen;

        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     *
     * @return \App\DTO\Client
     */
    public function setProtocol(string $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * @return string
     */
    public function getRand(): string
    {
        return $this->rand;
    }

    /**
     * @param string $rand
     *
     * @return \App\DTO\Client
     */
    public function setRand(string $rand): self
    {
        $this->rand = $rand;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return \App\DTO\Client
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     *
     * @return \App\DTO\Client
     */
    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return int
     */
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /**
     * @param int $sessionId
     *
     * @return \App\DTO\Client
     */
    public function setSessionId(int $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * @return \App\DTO\GeoLocation
     */
    public function getGeoLocation(): GeoLocation
    {
        return $this->geoLocation;
    }

    /**
     * @param \App\DTO\GeoLocation $geoLocation
     *
     * @return \App\DTO\Client
     */
    public function setGeoLocation(GeoLocation $geoLocation): self
    {
        $this->geoLocation = $geoLocation;

        return $this;
    }

    /**
     * @return \App\DTO\ClientInfo
     */
    public function getClientInfo(): ClientInfo
    {
        return $this->clientInfo;
    }

    /**
     * @param \App\DTO\ClientInfo $clientInfo
     *
     * @return \App\DTO\Client
     */
    public function setClientInfo(ClientInfo $clientInfo): self
    {
        $this->clientInfo = $clientInfo;

        return $this;
    }

    /**
     * @return string
     */
    public function getOs(): string
    {
        return $this->os;
    }

    /**
     * @param string $os
     *
     * @return \App\DTO\Client
     */
    public function setOs(string $os): self
    {
        $this->os = $os;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrowserName(): string
    {
        return $this->browserName;
    }

    /**
     * @param string $browserName
     *
     * @return \App\DTO\Client
     */
    public function setBrowserName(string $browserName): self
    {
        $this->browserName = $browserName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceType(): string
    {
        return $this->deviceType;
    }

    /**
     * @param string $deviceType
     *
     * @return \App\DTO\Client
     */
    public function setDeviceType(string $deviceType): self
    {
        $this->deviceType = $deviceType;

        return $this;
    }
}
