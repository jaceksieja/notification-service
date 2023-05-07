<?php

namespace App\Tests\unit\App\Domain\Channel;

use App\Domain\Channel\Channel;
use App\Domain\Channel\Resolver\ChannelsResolver;
use App\Infrastructure\Entity\Notification;
use App\Tests\UnitTester;
use Codeception\Test\Unit;
use PHPUnit\Framework\Assert;

class ResolverTest extends Unit
{
    protected UnitTester $tester;

    public static function cases(): \Generator
    {
        yield [['sms'], Channel::from('sms'), true];
        yield [['email'], Channel::from('sms'), false];
        yield [['sms', 'email'], Channel::from('sms'), true];
        yield [['sms', 'email'], Channel::from('push'), false];
    }

    protected function _before()
    {
    }

    /**
     * @dataProvider cases
     */
    public function testResolveChannelForDifferentChannelEnabledConfiguration(
        array $enabledChannels,
        Channel $channel,
        bool $expectedResult
    ): void {
        $channelResolver = new ChannelsResolver($enabledChannels);
        $notification = new Notification();
        $notification->setChannel($channel);

        $result = $channelResolver->resolve($notification);

        if ($expectedResult) {
            Assert::assertEquals($channel, $result);
        } else {
            Assert::assertNull($result);
        }
    }
}
