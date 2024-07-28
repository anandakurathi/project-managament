<?php

namespace App\Enum;

enum Status: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'in-active';
    case CLOSED = 'closed';
}
