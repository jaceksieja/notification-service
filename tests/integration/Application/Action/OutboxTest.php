<?php

namespace App\Tests\integration\Application\Action;

use App\Application\Action\Outbox;
use App\Domain\Action\CreateNotification;
use App\Domain\Action\ProcessNotification;
use App\Infrastructure\Repository\DoctrineRepository;
use App\Tests\IntegrationTester;
use App\Tests\Mock\AWS\SES\SendEmail;
use App\Tests\Mock\Pushy\SendPush;
use App\Tests\Mock\Twilio\SMS\SendSMS;
use Codeception\Test\Unit;
use PHPUnit\Framework\Assert;

class OutboxTest extends Unit
{
    protected IntegrationTester $tester;
    private CreateNotification $createNotification;
    private ProcessNotification $processNotification;
    private DoctrineRepository $outboxRepository;
    private Outbox $outbox;
    private SendEmail $sendEmail;
    private SendSMS $sendSMS;
    private SendPush $sendPushy;

    protected function _before(): void
    {
        $this->createNotification = $this->tester->grabService(CreateNotification::class);
        $this->processNotification = $this->tester->grabService(ProcessNotification::class);
        $this->outboxRepository = $this->tester->grabService('outbox.doctrine.repository');
        $this->outbox = $this->tester->grabService(Outbox::class);
        $this->sendEmail = $this->tester->grabService(\App\Infrastructure\Integration\AWS\SES\SendEmail::class);
        $this->sendSMS = $this->tester->grabService(\App\Infrastructure\Integration\Twilio\SMS\SendSMS::class);
        $this->sendPushy = $this->tester->grabService(\App\Infrastructure\Integration\Pushy\SendPush::class);
    }

    public function testSendNotificationWithProvider(): void
    {
        // Given
        ($this->createNotification)();
        $this->outboxRepository->getEntityManager()->flush();
        ($this->processNotification)();
        $this->outboxRepository->getEntityManager()->flush();

        // When
        ($this->outbox)();

        // Then
        Assert::assertCount(1, $this->sendEmail->results);
        Assert::assertCount(0, $this->sendSMS->results);
        Assert::assertCount(0, $this->sendPushy->results);
    }
}
