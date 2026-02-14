<?php

namespace App\Enums\Business\Tours;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PostTypeEnum: string implements HasLabel, HasColor
{
    case BLOG = 'blog';
    case TOUR_STORY = 'tour_story';
    case TRAVEL_GUIDE = 'travel_guide';
    case EXPERIENCE = 'experience';
    case ITINERARY = 'itinerary';
    case ANNOUNCEMENT = 'announcement';
    case REVIEW = 'review';
    case FAQ = 'faq';
    case NEWS = 'news';
    case DESTINATION = 'destination';

    public function getLabel(): string
    {
        return match ($this) {
            self::BLOG => 'Blog',
            self::TOUR_STORY => 'Tour Story',
            self::TRAVEL_GUIDE => 'Travel Guide',
            self::EXPERIENCE => 'Experience',
            self::ITINERARY => 'Itinerary',
            self::ANNOUNCEMENT => 'Announcement',
            self::REVIEW => 'Review',
            self::FAQ => 'Faq',
            self::NEWS => "News",
            self::DESTINATION => 'Destination'
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::BLOG => 'gray',
            self::TOUR_STORY => 'primary',
            self::TRAVEL_GUIDE => 'info',
            self::EXPERIENCE => 'success',
            self::ITINERARY => 'warning',
            self::ANNOUNCEMENT => 'danger',
            self::REVIEW => 'purple',
            self::FAQ => 'secondary',
            self::NEWS => 'indigo',
            self::DESTINATION => 'emerald',
        };
    }
}
