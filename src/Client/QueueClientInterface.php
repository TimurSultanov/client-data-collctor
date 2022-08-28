<?php

namespace App\Client;


use Generator;

interface QueueClientInterface
{
    /**
     * @param string $subscriptionName
     *
     * @return \Generator<string>
     */
    public function pull(string $subscriptionName): Generator;

    /**
     * @param string $topicName
     * @param string $message
     *
     * @return array
     */
    public function publish(string $topicName, string $message): array;
}
