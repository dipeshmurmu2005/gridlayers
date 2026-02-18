<?php

namespace App\Filament\ToursAdmin\Resources\Countries\Pages;

use App\Filament\ToursAdmin\Resources\Countries\CountryResource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->schema([
                TextInput::make('name')->required(),
                TextInput::make('page_title')->label('Page Title'),
                TextInput::make('slug')
                    ->live()
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('slug', Str::slug(strtolower($state)))
                    )
                    ->unique()
                    ->required(),
                FileUpload::make('cover_image')->disk('public')->required(),
                FileUpload::make('images')->disk('public')->multiple()->required()
            ])
                ->icon(Heroicon::PlusCircle)
                ->modalWidth(Width::Large)
                ->slideOver(),
        ];
    }
}
