<?php

namespace App\Models\Business\Tours;

use App\Enums\Business\Tours\PostStatusEnum;
use App\Enums\Business\Tours\PostTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'tenant';

    protected $guarded = [];
    protected $casts = [
        'type' => PostTypeEnum::class,
        'status' => PostStatusEnum::class
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
