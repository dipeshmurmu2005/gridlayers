<?php

namespace App\Models;

use App\Enums\ThemeStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => ThemeStatusEnum::class
    ];
}
