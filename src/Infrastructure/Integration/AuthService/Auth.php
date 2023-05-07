<?php

namespace App\Infrastructure\Integration\AuthService;

use App\Application\Auth\UserAuthInterface;
use App\Application\Model\User;

class Auth implements UserAuthInterface
{
    public function auth(string $userIdentifier): User
    {
        return new User(
            '+48691147400'
        );
    }
}
