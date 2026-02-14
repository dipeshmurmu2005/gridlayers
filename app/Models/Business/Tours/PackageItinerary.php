<?php

namespace App\Models\Business\Tours;

use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
