<?php

namespace App\Filament\Resources\PlatformPayments\Pages;

use App\Filament\Resources\PlatformPayments\PlatformPaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlatformPayment extends EditRecord
{
    protected static string $resource = PlatformPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
