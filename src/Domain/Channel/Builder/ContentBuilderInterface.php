<?php

namespace App\Domain\Channel\Builder;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

interface ContentBuilderInterface
{
    public function supports(Channel $channel): bool;

    public function build(NotificationInterface $notification): ?string;
}
