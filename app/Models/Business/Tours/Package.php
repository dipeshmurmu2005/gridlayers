<?php

namespace App\Models\Business\Tours;

use App\Enums\Business\Tours\PackageStatusEnum;
use App\Enums\Business\Tours\PackageTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $connection = 'tenant';

    protected $guarded = [];

    protected $casts = [
        'type' => PackageTypeEnum::class,
        'status' => PackageStatusEnum::class,
        'services' => 'array',
        'images' => 'array',
    ];

    public function destinations()
    {
        return $this->belongsToMany(
            Destination::class,
            'package_destinations',
            'package_id',
            'destination_id'
        );
    }

    public function itineraries()
    {
        return $this->hasMany(PackageItinerary::class, 'package_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'package_id');
    }
}
