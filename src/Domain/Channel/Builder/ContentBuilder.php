<?php

namespace App\Domain\Channel\Builder;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

class ContentBuilder
{
    private array $builders;

    public function __construct(
        ContentBuilderInterface ...$builders
    ) {
        $this->builders = $builders;
    }

    public function build(NotificationInterface $notification, Channel $channel): ?string
    {
        foreach ($this->builders as $builder) {
            if ($builder->supports($channel)) {
                return $builder->build($notification);
            }
        }

        return null;
    }
}
