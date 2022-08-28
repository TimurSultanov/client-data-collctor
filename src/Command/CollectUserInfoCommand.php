<?php

namespace App\Command;

use App\Model\DataCollector\ClientDataCollectorInterface;
use App\Model\StatisticCollector\StatisticsCollectorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CollectUserInfoCommand extends Command
{
    /**
     * @var \App\Model\DataCollector\ClientDataCollectorInterface
     */
    private ClientDataCollectorInterface $clientDataCollector;

    /**
     * @var \App\Model\StatisticCollector\StatisticsCollectorInterface
     */
    private StatisticsCollectorInterface $statisticsCollector;

    /**
     * @param \App\Model\DataCollector\ClientDataCollectorInterface $clientDataCollector
     * @param \App\Model\StatisticCollector\StatisticsCollectorInterface $statisticsCollector
     */
    public function __construct(
        ClientDataCollectorInterface $clientDataCollector,
        StatisticsCollectorInterface $statisticsCollector
    ) {
        $this->clientDataCollector = $clientDataCollector;
        $this->statisticsCollector = $statisticsCollector;

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
        $processingStatsCollection = $this->clientDataCollector->collect();
        $this->statisticsCollector->saveData($processingStatsCollection);

        return self::SUCCESS;
    }
}
