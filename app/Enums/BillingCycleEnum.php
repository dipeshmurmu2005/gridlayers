<?php

namespace App\Enums;

enum BillingCycleEnum: string
{
    case Monthly = 'monthly';
    case Yearly = 'yearly';

    public function getLabel(): string
    {
        return match ($this) {
            self::Monthly => "Monthly",
            self::Yearly => "Yearly",
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Monthly => 'primary',
            self::Yearly => 'success'
        };
    }
}
