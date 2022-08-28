<?php

namespace App\Command;

use App\Model\DataCollector\ClientDataCollectorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CollectUserInfo extends Command
{
    /**
     * @var \App\Model\DataCollector\ClientDataCollectorInterface
     */
    private ClientDataCollectorInterface $clientDataCollector;

    /**
     * @param \App\Model\DataCollector\ClientDataCollectorInterface $clientDataCollector
     */
    public function __construct(ClientDataCollectorInterface $clientDataCollector)
    {
        $this->clientDataCollector = $clientDataCollector;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('app:user:collect')
            ->setDescription('Receive data from queue, parse and save into a storage');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->clientDataCollector->collect();

        return self::SUCCESS;
    }
}
