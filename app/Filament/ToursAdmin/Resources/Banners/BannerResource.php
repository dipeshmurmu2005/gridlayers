<?php

namespace App\Filament\ToursAdmin\Resources\Banners;

use App\Filament\ToursAdmin\Resources\Banners\Pages\ListBanners;
use App\Filament\ToursAdmin\Resources\Banners\Schemas\BannerForm;
use App\Filament\ToursAdmin\Resources\Banners\Tables\BannersTable;
use App\Models\Business\Tours\Banner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    public static function form(Schema $schema): Schema
    {
        return BannerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BannersTable::configure($table);
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
            'index' => ListBanners::route('/'),
        ];
    }
}
