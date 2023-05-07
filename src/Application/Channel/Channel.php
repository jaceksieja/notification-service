<?php

namespace App\Application\Channel;

enum Channel: string
{
    case EMAIL = 'email';
    case PUSH = 'push';
    case SMS = 'sms';
}
