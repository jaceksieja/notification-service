<?php

namespace App\Application\Model;

interface OutboxInterface
{
    public function processed(): void;
}
