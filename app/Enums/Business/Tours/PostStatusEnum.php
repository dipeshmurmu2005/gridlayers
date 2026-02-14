<?php

namespace App\Enums\Business\Tours;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PostStatusEnum: string implements HasLabel, HasColor
{
    case PUBLISHED = 'published';
    case DRAFT = 'draft';

    public function getLabel(): string
    {
        return match ($this) {
            self::PUBLISHED => 'Published',
            self::DRAFT => 'Draft',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::PUBLISHED => 'success',
            self::DRAFT => 'warning',
        };
    }
}
