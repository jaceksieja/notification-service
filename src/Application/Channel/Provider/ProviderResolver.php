<?php

namespace App\Application\Channel\Provider;

use App\Domain\Channel\Channel;
use App\Domain\Channel\ProviderInterface;

readonly class ProviderResolver
{
    private array $providers;

    public function __construct(
        ProviderInterface ...$providers
    ) {
        $this->providers = $providers;
    }

    /**
     * @return iterable<ProviderInterface>
     */
    public function resolve(Channel $channel): iterable
    {
        $providers = [];

        foreach ($this->providers as $provider) {
            if ($provider->supports($channel)) {
                $providers[] = $provider;
            }
        }

        return $providers;
    }
}
