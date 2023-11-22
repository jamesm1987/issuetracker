<?php

namespace App\Enum;

enum IssuePriorityEnum: string
{
    case CRITICAL = 'critical';
    case HIGH = 'high';
    case MEDIUM = 'medium';
    case LOW = 'low';
}
