<?php

namespace App\Domain\Channel\Builder;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

class ContentBuilder
{
    private array $builder;

    public function __construct(
        ContentBuilderInterface ...$builder
    ) {
        $this->builder = $builder;
    }

    public function build(NotificationInterface $notification, Channel $channel): ?string
    {
        foreach ($this->builder as $builder) {
            if ($builder->supports($channel)) {
                return $builder->build($notification);
            }
        }

        return null;
    }
}
