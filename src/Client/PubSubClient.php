<?php

namespace App\Client;

use Generator;
use Google\Cloud\PubSub\MessageBuilder;
use Google\Cloud\PubSub\PubSubClient as GooglePubSubClient;

class PubSubClient implements QueueClientInterface
{
    /**
     * @var \Google\Cloud\PubSub\PubSubClient
     */
    private GooglePubSubClient $pubSubClient;

    /**
     * @param string $googleProjectId
     */
    public function __construct(string $googleProjectId)
    {
        $this->pubSubClient = new GooglePubSubClient([
            'projectId' => $googleProjectId,
        ]);
    }

    /**
     * @param string $subscriptionName
     *
     * @return \Generator<string>
     */
    public function pull(string $subscriptionName): Generator
    {
        $subscription = $this->pubSubClient->subscription($subscriptionName);

        foreach ($subscription->pull() as $message) {

            yield $message->data();

            $subscription->acknowledge($message);
        }
    }

    /**
     * @param string $topicName
     * @param string $message
     *
     * @return array
     */
    public function publish(string $topicName, string $message): array
    {
        $topic = $this->pubSubClient->topic($topicName);

        return $topic->publish((new MessageBuilder)->setData($message)->build());
    }
}
