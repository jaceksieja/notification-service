<?php

namespace App\Domain\Channel;

enum Channel: string
{
    case EMAIL = 'email';
    case PUSH = 'push';
    case SMS = 'sms';
}
