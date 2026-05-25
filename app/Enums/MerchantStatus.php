<?php

namespace App\Enums;

enum MerchantStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BANNED = 'banned';

    public function getLabel(): string
    {
        return match ($this) {
            self::ACTIVE => 'فعال',
            self::INACTIVE => 'غیرفعال',
            self::BANNED => 'مسدود',
        };
    }
}
