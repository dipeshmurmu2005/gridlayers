<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $guarded = [];

    public function themes()
    {
        return $this->hasMany(Theme::class, 'business_type_id');
    }
}
