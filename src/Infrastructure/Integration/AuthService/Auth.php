<?php

namespace App\Infrastructure\Integration\AuthService;

use App\Application\Auth\UserAuthInterface;
use App\Application\Model\User;

readonly class Auth implements UserAuthInterface
{
    public function __construct(private string $userPhoneNumber)
    {
    }

    public function auth(string $userIdentifier): User
    {
        return new User(
            $this->userPhoneNumber
        );
    }
}
