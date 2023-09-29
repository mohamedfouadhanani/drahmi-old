<?php

namespace App\Enums;

enum TargetConditionEnum: string
{
    case LT = 'Less Than';
    case LTE = 'Less Than or Equal';
    case EQ = "Equal";
    case GT = 'Greater Than';
    case GTE = 'Greater Than or Equal';

    public function operation() {
        return match($this)
        {
            self::LT => '<',
            self::LTE => '<=',
            self::EQ => '=',
            self::GT => '>',
            self::GTE => '>=',
        };
    }
}