<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnboardData extends Model
{
    protected $guarded = [];

    public function business()
    {
        return $this->hasOne(Business::class, 'slug', 'business_slug');
    }

    public function theme()
    {
        return $this->hasOne(Theme::class, 'slug', 'theme_slug');
    }
}
