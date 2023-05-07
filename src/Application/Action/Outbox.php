<?php

namespace App\Application\Action;

use App\Application\Channel\Provider\ProviderResolver;
use App\Application\Finder\OutboxToProcessStrategyInterface;

readonly class Outbox
{
    public function __construct(
        private OutboxToProcessStrategyInterface $outboxToProcessStrategy,
        private ProviderResolver $providerResolver
    ) {
    }

    public function __invoke(): void
    {
        $outbox = $this->outboxToProcessStrategy->find();

        if (null === $outbox) {
            return;
        }

        $providers = $this->providerResolver->resolve($outbox->getChannel());

        foreach ($providers as $provider) {
            $provider->send(
                $outbox->getNotification()
            );
        }
    }
}
