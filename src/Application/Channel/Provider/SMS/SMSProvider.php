<?php

namespace App\Application\Channel\Provider\SMS;

use App\Domain\Channel\Channel;
use App\Domain\Channel\ProviderInterface;
use App\Domain\Model\NotificationInterface;

class SMSProvider implements ProviderInterface
{
    private array $smsProviders;

    public function __construct(
        SMSProviderInterface ...$emailProviders
    ) {
        $this->smsProviders = $emailProviders;
    }

    public function supports(Channel $channel): bool
    {
        return Channel::SMS === $channel;
    }

    public function send(NotificationInterface $notification): bool
    {
        foreach ($this->smsProviders as $emailProvider) {
            if ($emailProvider->send($notification)) {
                return true;
            }
        }

        return false;
    }
}
