<?php

namespace App\Filament\ToursAdmin\Resources\Destinations;

use App\Filament\ToursAdmin\Resources\Destinations\Pages\CreateDestinations;
use App\Filament\ToursAdmin\Resources\Destinations\Pages\EditDestinations;
use App\Filament\ToursAdmin\Resources\Destinations\Pages\ListDestinations;
use App\Filament\ToursAdmin\Resources\Destinations\Schemas\DestinationsForm;
use App\Filament\ToursAdmin\Resources\Destinations\Tables\DestinationsTable;
use App\Models\Business\Tours\Destination;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DestinationsResource extends Resource
{
    protected static ?string $model = Destination::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DestinationsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DestinationsTable::configure($table);
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
            'index' => ListDestinations::route('/'),
        ];
    }
}
