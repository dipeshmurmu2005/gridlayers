<?php

namespace App\Filament\ToursAdmin\Resources\Banners\Pages;

use App\Filament\ToursAdmin\Resources\Banners\BannerResource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;

class ListBanners extends ListRecords
{
    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    TextInput::make('button_title'),
                    TextInput::make('button_link'),
                    FileUpload::make('cover_image')->disk('public')
                ])
                ->modalWidth(Width::Large)
                ->slideOver()
                ->icon(Heroicon::PlusCircle),
        ];
    }
}
