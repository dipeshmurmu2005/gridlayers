<?php

namespace App\Filament\ToursAdmin\Resources\Destinations\Pages;

use App\Filament\ToursAdmin\Resources\Destinations\DestinationsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDestinations extends EditRecord
{
    protected static string $resource = DestinationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
