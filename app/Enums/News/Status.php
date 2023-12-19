<?php

namespace App\Enums\News;

enum Status: string
{
    case DRAFT = 'Draft';
    case ACTIVE = 'Active';
    case BLOCKED = 'Blocked';

    public static function getEnums(): array
    {
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value
        ];
    }

}
