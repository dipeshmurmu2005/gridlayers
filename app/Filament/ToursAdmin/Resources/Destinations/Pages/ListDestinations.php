<?php

namespace App\Filament\ToursAdmin\Resources\Destinations\Pages;

use App\Enums\Business\Tours\DestinationTypeEnum;
use App\Filament\ToursAdmin\Resources\Destinations\DestinationsResource;
use App\Models\Business\Tours\Country;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ListDestinations extends ListRecords
{
    protected static string $resource = DestinationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->schema([
                Grid::make(2)->schema([
                    TextInput::make('name')->required(),
                    Select::make('country_id')->label('Country')->options(Country::pluck('name', 'id'))
                        ->live()
                        ->required(),
                    TextInput::make('slug')
                        ->live()
                        ->afterStateUpdated(
                            fn($state, callable $set) =>
                            $set('slug', Str::slug(strtolower($state)))
                        )
                        ->unique()
                        ->required(),
                    Select::make('type')->options(DestinationTypeEnum::class),
                    TextInput::make('keywords')
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('short_description')->required(),
                    FileUpload::make('cover_image')
                        ->required()
                        ->disk('public'),
                    RichEditor::make('content')
                        ->columnSpanFull(),
                    FileUpload::make('images')
                        ->columnSpanFull()
                        ->disk('public')
                        ->multiple(),
                ])
            ])
                ->icon(Heroicon::PlusCircle)
                ->modalWidth(Width::ScreenLarge)
                ->slideOver(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Featured' =>  Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_featured', true)),
            'active' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', true)),
            'inactive' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', false)),
        ];
    }
}
