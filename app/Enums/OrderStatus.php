<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING_APPROVAL = 'pending_approval';
    case INITIAL_APPROVAL = 'initial_approval';
    case FINAL_APPROVAL = 'final_approval';
    case REJECTED = 'rejected';

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING_APPROVAL => 'در انتظار تایید',
            self::INITIAL_APPROVAL => 'تایید اولیه',
            self::FINAL_APPROVAL => 'تایید نهایی',
            self::REJECTED => 'عدم تایید',
        };
    }
}
