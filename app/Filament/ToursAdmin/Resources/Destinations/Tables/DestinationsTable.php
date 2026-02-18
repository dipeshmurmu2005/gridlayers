<?php

namespace App\Filament\ToursAdmin\Resources\Destinations\Tables;

use App\Enums\Business\Tours\DestinationTypeEnum;
use App\Models\Business\Tours\Country;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DestinationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('slug')->color('success')->badge()->prefix('/'),
                TextColumn::make('country.name')->icon(Heroicon::MapPin),
                TextColumn::make('type')->badge(),
                ToggleColumn::make('status'),
                ToggleColumn::make('is_featured')->label('Feature'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->schema([
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
                    ->modalWidth(Width::ScreenLarge)
                    ->slideOver(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
