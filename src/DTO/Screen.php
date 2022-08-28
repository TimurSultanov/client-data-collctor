<?php

namespace App\DTO;

class Screen
{
    private int $availHeight;

    private int $availWidth;

    private int $height;

    private int $width;

    private int $devicePixelRatio;

    private int $innerWidth;

    private int $innerHeight;

    /**
     * @return int
     */
    public function getAvailHeight(): int
    {
        return $this->availHeight;
    }

    /**
     * @param int $availHeight
     *
     * @return \App\DTO\Screen
     */
    public function setAvailHeight(int $availHeight): self
    {
        $this->availHeight = $availHeight;

        return $this;
    }

    /**
     * @return int
     */
    public function getAvailWidth(): int
    {
        return $this->availWidth;
    }

    /**
     * @param int $availWidth
     *
     * @return \App\DTO\Screen
     */
    public function setAvailWidth(int $availWidth): self
    {
        $this->availWidth = $availWidth;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return \App\DTO\Screen
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return \App\DTO\Screen
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getDevicePixelRatio(): int
    {
        return $this->devicePixelRatio;
    }

    /**
     * @param int $devicePixelRatio
     *
     * @return \App\DTO\Screen
     */
    public function setDevicePixelRatio(int $devicePixelRatio): self
    {
        $this->devicePixelRatio = $devicePixelRatio;

        return $this;
    }

    /**
     * @return int
     */
    public function getInnerWidth(): int
    {
        return $this->innerWidth;
    }

    /**
     * @param int $innerWidth
     *
     * @return \App\DTO\Screen
     */
    public function setInnerWidth(int $innerWidth): self
    {
        $this->innerWidth = $innerWidth;

        return $this;
    }

    /**
     * @return int
     */
    public function getInnerHeight(): int
    {
        return $this->innerHeight;
    }

    /**
     * @param int $innerHeight
     *
     * @return \App\DTO\Screen
     */
    public function setInnerHeight(int $innerHeight): self
    {
        $this->innerHeight = $innerHeight;

        return $this;
    }
}
