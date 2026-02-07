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

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }
}
