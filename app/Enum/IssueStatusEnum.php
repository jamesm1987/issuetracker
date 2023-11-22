<?php

namespace App\Enum;

enum IssueStatusEnum: string
{
    case OPEN = "open";
    case FIXED = 'fixed';
    case READY_FOR_RETEST = 'ready for retest';
    case FIXED_NOT_CONFIRMED = 'fixed not confirmed';
    case MISSING_INFORMATION = 'missing information';
    case CLOSED = 'closed';
    case PUSHED_BACK = 'pushed back';
    case NOT_AN_ISSUE = 'not an issue';
    case IN_PROGRESS = 'in progress';
    case NOT_REPRODUCIBLE = 'not reproducible';
    case READY_FOR_NEXT_RELEASE = 'ready for next release';
    case DUPLICATE_ISSUE = 'duplicate issue';
    case ON_HOLD = 'on hold';


    // Define a custom getValue function
    public static function getValue($enumValue)
    {
        $reflectionClass = new \ReflectionClass(static::class);

        if ($reflectionClass->hasConstant($enumValue)) {
            return constant(static::class . '::' . $enumValue);
        }

        return null;
    }

}