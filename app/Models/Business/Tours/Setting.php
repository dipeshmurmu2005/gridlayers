<?php

namespace App\Models\Business\Tours;

use App\Enums\Business\Tours\SocialLinkEnum;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $connection = 'tenant';

    protected $guarded = [];

    protected $casts = [
        'social_links' => 'array',
        'social_links.media' => SocialLinkEnum::class,
        'whatsapp_credentials' => 'array'
    ];
}
