<?php

namespace App\Tests\Api\notifications;

use App\Infrastructure\Repository\DoctrineRepository;
use App\Tests\ApiTester;
use PHPUnit\Framework\Assert;

class CreateCest
{
    private DoctrineRepository $inboxRepository;

    public function _before(ApiTester $I): void
    {
        $this->inboxRepository = $I->grabService('inbox.doctrine.repository');

        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('content-type', 'application/json');
    }

    public function canRegisterNotification(ApiTester $I): void
    {
        $I->sendPost('/', [
            'type' => 'example',
            'channels' => ['sms', 'email'],
            'userIdentifier' => 'eeb4ef91-1ac0-4d4c-98f8-24ac33832c39',
        ]);

        $I->canSeeResponseCodeIs(202);
        $I->seeResponseIsValidOnJsonSchema(__DIR__.'/response_schemas/register_notification_success.json');

        $inbox = $this->inboxRepository->findAll();

        Assert::assertNotNull($inbox);
        Assert::assertCount(2, $inbox);
    }
}
