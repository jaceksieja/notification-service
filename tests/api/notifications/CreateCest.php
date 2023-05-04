<?php

namespace App\Tests\Api\notifications;

use App\Infrastructure\Entity\Inbox;
use App\Tests\ApiTester;

class CreateCest
{
    public function _before(ApiTester $I): void
    {
    }

    public function canRegisterNotification(ApiTester $I): void
    {
        $I->sendPost('/notifications', []);
        $I->canSeeResponseCodeIs(201);
        $I->seeResponseIsValidOnJsonSchema(__DIR__.'/response_schemas/register_notification_success.json');
        $I->canSeeInRepository(Inbox::class, []);
    }
}
