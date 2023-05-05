<?php

namespace App\Tests\integration\Application\Action;

use App\Application\Action\InboxToNotification;
use App\Infrastructure\Entity\Inbox;
use App\Infrastructure\Entity\Type;
use App\Infrastructure\Repository\DoctrineRepository;
use App\Tests\IntegrationTester;
use Codeception\Test\Unit;
use PHPUnit\Framework\Assert;

class InboxToNotificationTest extends Unit
{
    protected IntegrationTester $tester;
    private InboxToNotification $inboxToNotification;
    private DoctrineRepository $notificationRepository;

    protected function _before(): void
    {
        $this->inboxToNotification = $this->tester->grabService(InboxToNotification::class);
        $this->notificationRepository = $this->tester->grabService('notification.doctrine.repository');
    }

    // tests
    public function testSomeFeature(): void
    {
        // Given
        $inbox = new Inbox();
        $inbox->setType(Type::NOTIFICATION);
        $inbox->setContent([]);
        $this->tester->haveInRepository($inbox);

        // When
        ($this->inboxToNotification)();
        $this->notificationRepository->getEntityManager()->flush();

        // Then
        $notification = $this->notificationRepository->findOneBy([]);
        Assert::assertNotNull($notification);
    }
}
