<?php

namespace App\Infrastructure\Integration\Twilio\SMS;

use App\Application\Auth\UserAuthInterface;
use App\Application\Channel\Provider\SMS\SMSProviderInterface;
use App\Domain\Channel\Builder\ContentBuilder;
use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;
use Twilio\Rest\Client;

readonly class SendSMS implements SMSProviderInterface
{
    public function __construct(
        private string $accountSID,
        private string $tokenAuth,
        private string $senderPhoneNumber,
        private ContentBuilder $contentBuilder,
        private UserAuthInterface $userAuth
    ) {
    }

    public function send(NotificationInterface $notification): bool
    {
        try {
            $this->doSend($notification);

            return true;
        } catch (\Throwable) {
            // @todo logging error
        }

        return false;
    }

    public static function getDefaultPriority(): int
    {
        return 100;
    }

    private function getClient(): Client
    {
        return new Client($this->accountSID, $this->tokenAuth);
    }

    private function doSend(NotificationInterface $notification): void
    {
        $message = $this->contentBuilder->build($notification, Channel::SMS);

        if (null === $message) {
            // @todo logging
            return;
        }

        $user = $this->userAuth->auth($notification->getUserIdentifier());

        $this->getClient()->messages->create(
            $user->getPhoneNumber(),
            [
                'from' => $this->senderPhoneNumber,
                'body' => $message,
            ]
        );
    }
}
