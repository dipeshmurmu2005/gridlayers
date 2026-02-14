<?php

namespace App\Enums\Business\Tours;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;

enum PackageTypeEnum: string implements HasLabel, HasColor, HasIcon
{
    case DOMESTIC = 'domestic';
    case INTERNATIONAL = 'international';
    case MIXED = 'mixed';
    case ADVENTURE = 'adventure';
    case FAMILY = 'family';
    case HONEYMOON = 'honeymoon';
    case GROUP = 'group';
    case CUSTOM = 'custom';

    public function getLabel(): string
    {
        return match ($this) {
            self::DOMESTIC => 'Domestic',
            self::INTERNATIONAL => 'International',
            self::MIXED => 'Mixed (Domestic + International)',
            self::ADVENTURE => 'Adventure',
            self::FAMILY => 'Family',
            self::HONEYMOON => 'Honeymoon',
            self::GROUP => 'Group Tour',
            self::CUSTOM => 'Custom Package',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::DOMESTIC => 'success',
            self::INTERNATIONAL => 'primary',
            self::MIXED => 'warning',
            self::ADVENTURE => 'danger',
            self::FAMILY => 'info',
            self::HONEYMOON => 'pink',
            self::GROUP => 'secondary',
            self::CUSTOM => 'gray',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::DOMESTIC => 'heroicon-o-map',
            self::INTERNATIONAL => 'heroicon-o-globe-alt',
            self::MIXED => 'heroicon-o-arrows-right-left',
            self::ADVENTURE => 'heroicon-o-fire',
            self::FAMILY => 'heroicon-o-users',
            self::HONEYMOON => 'heroicon-o-heart',
            self::GROUP => 'heroicon-o-user-group',
            self::CUSTOM => 'heroicon-o-adjustments-horizontal',
        };
    }
}
