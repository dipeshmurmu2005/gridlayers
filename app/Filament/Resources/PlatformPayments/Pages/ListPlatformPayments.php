<?php

namespace App\Filament\Resources\PlatformPayments\Pages;

use App\Filament\Resources\PlatformPayments\PlatformPaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlatformPayments extends ListRecords
{
    protected static string $resource = PlatformPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
