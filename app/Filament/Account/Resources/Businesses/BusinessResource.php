<?php

namespace App\Filament\Account\Resources\Businesses;

use App\Filament\Account\Resources\Businesses\Pages\CreateBusiness;
use App\Filament\Account\Resources\Businesses\Pages\EditBusiness;
use App\Filament\Account\Resources\Businesses\Pages\ListBusinesses;
use App\Filament\Account\Resources\Businesses\Schemas\BusinessForm;
use App\Filament\Account\Resources\Businesses\Tables\BusinessesTable;
use App\Models\Tenant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BusinessResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice;

    protected static ?string $modelLabel = 'Business';

    protected static ?string $pluralModelLabel = 'Businesses';

    public static function form(Schema $schema): Schema
    {
        return BusinessForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BusinessesTable::configure($table);
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
            'index' => ListBusinesses::route('/'),
            'create' => CreateBusiness::route('/create'),
            'edit' => EditBusiness::route('/{record}/edit'),
        ];
    }
}
