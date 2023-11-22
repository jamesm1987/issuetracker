<?php

namespace App\Enum;

enum IssueActionEnum: string
{
    case CREATED = 'created';
    case ASSIGNED = 'assigned';
    case EDITED = 'edited';
}
