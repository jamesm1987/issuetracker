<?php

namespace App\Enum;

enum IssueRoleEnum: string
{
    case CREATOR = 'creator';
    case FIXER = 'fixer';
    case TESTER = 'tester';
    case OBSERVER = 'observer';
}
