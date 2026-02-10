<?php

namespace App\Models;

use App\Enums\TenantStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = [];
    protected $casts = [
        'status' => TenantStatusEnum::class
    ];

    public function Business()
    {
        return $this->belongsTo(Business::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'business_type_id');
    }
}
