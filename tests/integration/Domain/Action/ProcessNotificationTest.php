<?php

namespace App\Tests\integration\Domain\Action;

use App\Domain\Action\CreateNotification;
use App\Domain\Action\ProcessNotification;
use App\Domain\Channel\Channel;
use App\Infrastructure\Repository\DoctrineRepository;
use App\Tests\IntegrationTester;
use Codeception\Test\Unit;
use PHPUnit\Framework\Assert;

class ProcessNotificationTest extends Unit
{
    protected IntegrationTester $tester;
    private CreateNotification $createNotification;
    private ProcessNotification $processNotification;
    private DoctrineRepository $outboxRepository;

    protected function _before(): void
    {
        $this->createNotification = $this->tester->grabService(CreateNotification::class);
        $this->processNotification = $this->tester->grabService(ProcessNotification::class);
        $this->outboxRepository = $this->tester->grabService('outbox.doctrine.repository');
    }

    public function testTransformNotificationToOutbox(): void
    {
        // Given
        ($this->createNotification)(Channel::from('email'), 'eeb4ef91-1ac0-4d4c-98f8-24ac33832c39');
        $this->outboxRepository->getEntityManager()->flush();
        // When
        ($this->processNotification)();
        $this->outboxRepository->getEntityManager()->flush();
        // Then
        $outbox = $this->outboxRepository->findOneBy([]);
        Assert::assertNotNull($outbox);
    }
}
