<?php

namespace App\Application\Channel\Provider\Email;

use App\Domain\Channel\Channel;
use App\Domain\Channel\ProviderInterface;
use App\Domain\Model\NotificationInterface;

class EmailProvider implements ProviderInterface
{
    private array $emailProviders;

    public function __construct(
        EmailProviderInterface ...$emailProviders
    ) {
        $this->emailProviders = $emailProviders;
    }

    public function supports(Channel $channel): bool
    {
        return Channel::from('email') === $channel;
    }

    public function send(NotificationInterface $notification): bool
    {
        foreach ($this->emailProviders as $emailProvider) {
            if ($emailProvider->send($notification)) {
                return true;
            }
        }

        return false;
    }
}
