<?php

namespace App\Tests\integration\Application\Action;

use App\Application\Action\InboxToNotification;
use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;
use App\Infrastructure\Entity\Inbox;
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

    public function testTransformInboxToNotification(): void
    {
        // Given
        $inbox = new Inbox();
        $inbox->setType(Type::from('example'));
        $inbox->setChannel(Channel::from('sms'));
        $inbox->setUserIdentifier('eeb4ef91-1ac0-4d4c-98f8-24ac33832c39');
        $this->tester->haveInRepository($inbox);

        // When
        ($this->inboxToNotification)();
        $this->notificationRepository->getEntityManager()->flush();

        // Then
        $notification = $this->notificationRepository->findOneBy([]);
        Assert::assertNotNull($notification);
    }
}
