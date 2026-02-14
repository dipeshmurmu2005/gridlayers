<?php

namespace App\Enums\Business\Tours;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;

enum DestinationTypeEnum: string implements HasLabel, HasColor, HasIcon
{
    case CITY = 'city';
    case BEACH = 'beach';
    case HILL = 'hill';
    case ADVENTURE = 'adventure';
    case HERITAGE = 'heritage';
    case WILDLIFE = 'wildlife';
    case PILGRIMAGE = 'pilgrimage';
    case ISLAND = 'island';
    case DESERT = 'desert';

    public function getLabel(): string
    {
        return match ($this) {
            self::CITY => 'City',
            self::BEACH => 'Beach',
            self::HILL => 'Hill Station',
            self::ADVENTURE => 'Adventure',
            self::HERITAGE => 'Heritage',
            self::WILDLIFE => 'Wildlife',
            self::PILGRIMAGE => 'Pilgrimage',
            self::ISLAND => 'Island',
            self::DESERT => 'Desert',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::CITY => 'gray',
            self::BEACH => 'info',
            self::HILL => 'success',
            self::ADVENTURE => 'warning',
            self::HERITAGE => 'primary',
            self::WILDLIFE => 'success',
            self::PILGRIMAGE => 'secondary',
            self::ISLAND => 'info',
            self::DESERT => 'danger',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::CITY => 'heroicon-o-building-office',
            self::BEACH => 'heroicon-o-sun',
            self::HILL => 'hugeicons-mountain',
            self::ADVENTURE => 'heroicon-o-fire',
            self::HERITAGE => 'heroicon-o-building-library',
            self::WILDLIFE => 'heroicon-o-bug-ant',
            self::PILGRIMAGE => 'heroicon-o-heart',
            self::ISLAND => 'heroicon-o-globe-alt',
            self::DESERT => 'heroicon-o-fire',
        };
    }
}
