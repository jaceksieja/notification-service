<?php

namespace App\Application\Auth;

use App\Application\Model\User;

interface UserAuthInterface
{
    public function auth(string $userIdentifier): User;
}
