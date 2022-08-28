<?php

namespace App\Client;

use App\Exception\MethodNotImplementedException;
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
     * @throws \App\Exception\MethodNotImplementedException
     */
    public function set(string $key, string $value): void
    {
        throw new MethodNotImplementedException(__METHOD__);
    }

}
