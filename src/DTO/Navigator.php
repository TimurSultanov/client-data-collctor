<?php

namespace App\DTO;

class Navigator
{
    private string $appName;

    private string $appCodeName;

    private bool $pdfViewerEnabled;

    private string $platform;

    /**
     * @return string
     */
    public function getAppName(): string
    {
        return $this->appName;
    }

    /**
     * @param string $appName
     *
     * @return \App\DTO\Navigator
     */
    public function setAppName(string $appName): self
    {
        $this->appName = $appName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAppCodeName(): string
    {
        return $this->appCodeName;
    }

    /**
     * @param string $appCodeName
     *
     * @return \App\DTO\Navigator
     */
    public function setAppCodeName(string $appCodeName): self
    {
        $this->appCodeName = $appCodeName;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPdfViewerEnabled(): bool
    {
        return $this->pdfViewerEnabled;
    }

    /**
     * @param bool $pdfViewerEnabled
     *
     * @return \App\DTO\Navigator
     */
    public function setPdfViewerEnabled(bool $pdfViewerEnabled): self
    {
        $this->pdfViewerEnabled = $pdfViewerEnabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     *
     * @return \App\DTO\Navigator
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }
}
