<?php

namespace App\Models\Business\Tours;

use Illuminate\Database\Eloquent\Model;

class PackageDestination extends Model
{
    protected $connection = 'tenant';

    protected $guarded = [];
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
