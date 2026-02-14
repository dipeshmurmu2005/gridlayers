<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum SubscriptionStatusEnum: string implements HasLabel, HasColor, HasIcon
{
    case TRIALING = 'trialing';
    case ACTIVE = 'active';
    case PAST_DUE = 'past_due';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';
    case PENDING = 'pending';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::TRIALING => 'Trial',
            self::ACTIVE => 'Active',
            self::PAST_DUE => 'Past Due',
            self::CANCELLED => 'Cancelled',
            self::EXPIRED => 'Expired',
            self::PENDING => 'Pending',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::TRIALING => 'info',
            self::ACTIVE => 'success',
            self::PAST_DUE => 'warning',
            self::CANCELLED => 'danger',
            self::EXPIRED => 'gray',
            self::PENDING => 'primary',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::TRIALING => 'heroicon-o-clock',
            self::ACTIVE => 'heroicon-o-check-circle',
            self::PAST_DUE => 'heroicon-o-exclamation-circle',
            self::CANCELLED => 'heroicon-o-x-circle',
            self::EXPIRED => 'heroicon-o-no-symbol',
            self::PENDING => 'heroicon-o-clock'
        };
    }
}
