<?php

namespace App\Filament\ToursAdmin\Resources\Countries\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class CountriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')->disk('public')->size(100),
                TextColumn::make('name'),
                TextColumn::make('page_title'),
                TextColumn::make('slug'),
                ToggleColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('page_title')->required()->label('Page Title'),
                    TextInput::make('slug')
                        ->live()
                        ->afterStateUpdated(
                            fn($state, callable $set) =>
                            $set('slug', Str::slug(strtolower($state)))
                        )
                        ->required(),
                    FileUpload::make('cover_image')->disk('public')->required(),
                    FileUpload::make('images')->multiple()->required()
                ])
                    ->modalWidth(Width::Large)
                    ->slideOver(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
