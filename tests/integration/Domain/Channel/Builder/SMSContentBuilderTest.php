<?php

namespace App\Tests\integration\Domain\Channel\Builder;

use App\Domain\Channel\Builder\ContentBuilder;
use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;
use App\Infrastructure\Entity\Notification;
use App\Tests\IntegrationTester;
use Codeception\Test\Unit;
use PHPUnit\Framework\Assert;

class SMSContentBuilderTest extends Unit
{
    protected IntegrationTester $tester;

    private ContentBuilder $contentBuilder;

    protected function _before(): void
    {
        $this->contentBuilder = $this->tester->grabService(ContentBuilder::class);
    }

    public function testGenerateSMSContent(): void
    {
        $notification = new Notification();
        $notification->setType(Type::EXAMPLE);
        $notification->setChannel(Channel::SMS);

        $content = $this->contentBuilder->build($notification, Channel::SMS);

        Assert::assertEquals('some example message build form notification', $content);
    }
}
