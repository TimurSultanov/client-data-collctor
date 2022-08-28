<?php

namespace App\Client;

interface StorageClientInterface
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function get(string $key): string;

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function set(string $key, string $value): void;
}
