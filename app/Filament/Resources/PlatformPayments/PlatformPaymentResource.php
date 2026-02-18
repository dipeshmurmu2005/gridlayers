<?php

namespace App\Filament\Resources\PlatformPayments;

use App\Filament\Resources\PlatformPayments\Pages\CreatePlatformPayment;
use App\Filament\Resources\PlatformPayments\Pages\EditPlatformPayment;
use App\Filament\Resources\PlatformPayments\Pages\ListPlatformPayments;
use App\Filament\Resources\PlatformPayments\Schemas\PlatformPaymentForm;
use App\Filament\Resources\PlatformPayments\Tables\PlatformPaymentsTable;
use App\Models\PlatformPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlatformPaymentResource extends Resource
{
    protected static ?string $model = PlatformPayment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CurrencyRupee;

    public static function form(Schema $schema): Schema
    {
        return PlatformPaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlatformPaymentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlatformPayments::route('/'),
            'create' => CreatePlatformPayment::route('/create'),
            'edit' => EditPlatformPayment::route('/{record}/edit'),
        ];
    }
}
