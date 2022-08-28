<?php

namespace App\Client;

use Redis;

class RedisClient implements StorageClientInterface
{
    private Redis $redisClient;

    /**
     * @param \Redis $redisClient
     */
    public function __construct(Redis $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    /**
     * @param string $key
     *
     * @return string
     *
     * @throws \RedisException
     */
    public function get(string $key): string
    {
        return $this->redisClient->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     *
     * @throws \RedisException
     */
    public function set(string $key, string $value): void
    {
        $this->redisClient->set($key, $value);
    }
}
