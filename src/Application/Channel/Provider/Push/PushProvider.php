<?php

namespace App\Application\Channel\Provider\Push;

use App\Domain\Channel\Channel;
use App\Domain\Channel\ProviderInterface;
use App\Domain\Model\NotificationInterface;

class PushProvider implements ProviderInterface
{
    private array $pushProviders;

    public function __construct(
        PushProviderInterface ...$emailProviders
    ) {
        $this->pushProviders = $emailProviders;
    }

    public function supports(Channel $channel): bool
    {
        return Channel::from('push') === $channel;
    }

    public function send(NotificationInterface $notification): bool
    {
        foreach ($this->pushProviders as $emailProvider) {
            if ($emailProvider->send($notification)) {
                return true;
            }
        }

        return false;
    }
}
