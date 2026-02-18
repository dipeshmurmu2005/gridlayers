<?php

namespace App\Filament\ToursAdmin\Resources\Posts\Pages;

use App\Filament\ToursAdmin\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
