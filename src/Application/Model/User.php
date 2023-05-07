<?php

namespace App\Application\Model;

readonly class User
{
    public function __construct(
        private string $phoneNumber
    ) {
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
