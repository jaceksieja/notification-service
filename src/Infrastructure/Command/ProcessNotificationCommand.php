<?php

namespace App\Infrastructure\Command;

use App\Domain\Action\ProcessNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:process-notification')]
class ProcessNotificationCommand extends Command
{
    public function __construct(
        private readonly ProcessNotification $processNotification,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // @todo add some lock mechanism against taking the same inbox record twice

        try {
            ($this->processNotification)();
            $this->entityManager->flush();
        } catch (\Throwable) {
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
