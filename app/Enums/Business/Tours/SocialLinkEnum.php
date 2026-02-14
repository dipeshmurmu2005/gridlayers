<?php

namespace App\Enums\Business\Tours;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasColor;

enum SocialLinkEnum: string implements HasLabel, HasIcon, HasColor
{
    case FACEBOOK = 'facebook';
    case INSTAGRAM = 'instagram';
    case TWITTER = 'twitter';
    case X = 'x';
    case LINKEDIN = 'linkedin';
    case YOUTUBE = 'youtube';
    case TIKTOK = 'tiktok';
    case PINTEREST = 'pinterest';
    case SNAPCHAT = 'snapchat';
    case WHATSAPP = 'whatsapp';
    case TELEGRAM = 'telegram';
    case DISCORD = 'discord';
    case REDDIT = 'reddit';
    case GITHUB = 'github';
    case WEBSITE = 'website';

    public function getLabel(): string
    {
        return match ($this) {
            self::FACEBOOK => 'Facebook',
            self::INSTAGRAM => 'Instagram',
            self::TWITTER => 'Twitter',
            self::X => 'X (Twitter)',
            self::LINKEDIN => 'LinkedIn',
            self::YOUTUBE => 'YouTube',
            self::TIKTOK => 'TikTok',
            self::PINTEREST => 'Pinterest',
            self::SNAPCHAT => 'Snapchat',
            self::WHATSAPP => 'WhatsApp',
            self::TELEGRAM => 'Telegram',
            self::DISCORD => 'Discord',
            self::REDDIT => 'Reddit',
            self::GITHUB => 'GitHub',
            self::WEBSITE => 'Website',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::FACEBOOK => 'fab-facebook',
            self::INSTAGRAM => 'fab-instagram',
            self::TWITTER => 'fab-twitter',
            self::X => 'fab-x-twitter',
            self::LINKEDIN => 'fab-linkedin',
            self::YOUTUBE => 'fab-youtube',
            self::TIKTOK => 'fab-tiktok',
            self::PINTEREST => 'fab-pinterest',
            self::SNAPCHAT => 'fab-snapchat',
            self::WHATSAPP => 'fab-whatsapp',
            self::TELEGRAM => 'fab-telegram',
            self::DISCORD => 'fab-discord',
            self::REDDIT => 'fab-reddit',
            self::GITHUB => 'fab-github',
            self::WEBSITE => 'heroicon-o-globe-alt',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::FACEBOOK => 'blue',
            self::INSTAGRAM => 'pink',
            self::TWITTER, self::X => 'gray',
            self::LINKEDIN => 'info',
            self::YOUTUBE => 'danger',
            self::TIKTOK => 'dark',
            self::PINTEREST => 'rose',
            self::SNAPCHAT => 'warning',
            self::WHATSAPP => 'success',
            self::TELEGRAM => 'info',
            self::DISCORD => 'indigo',
            self::REDDIT => 'orange',
            self::GITHUB => 'gray',
            self::WEBSITE => 'secondary',
        };
    }
}
