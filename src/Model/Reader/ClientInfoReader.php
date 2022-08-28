<?php

namespace App\Model\Reader;

use App\Client\StorageClientInterface;
use App\DTO\ClientInfo;
use Symfony\Component\Serializer\SerializerInterface;

class ClientInfoReader implements ClientInfoReaderInterface
{
    public const KEY_TEMPLATE = 'client_info:%d';

    /**
     * @var \App\Client\StorageClientInterface
     */
    private StorageClientInterface $storageClient;

    /**
     * @var \Symfony\Component\Serializer\SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @param \App\Client\StorageClientInterface $storageClient
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     */
    public function __construct(StorageClientInterface $storageClient, SerializerInterface $serializer)
    {
        $this->storageClient = $storageClient;
        $this->serializer = $serializer;
    }

    /**
     * @param int $clientId
     *
     * @return \App\DTO\ClientInfo
     */
    public function getClientById(int $clientId): ClientInfo
    {
        $serializedClientInfo = $this->storageClient->get(sprintf(self::KEY_TEMPLATE, $clientId));

        return $this->serializer->deserialize($serializedClientInfo, ClientInfo::class, 'json');
    }
}
