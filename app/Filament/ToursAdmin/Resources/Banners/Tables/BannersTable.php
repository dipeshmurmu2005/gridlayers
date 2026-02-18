<?php

namespace App\Filament\ToursAdmin\Resources\Banners\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->disk('public')
                    ->extraImgAttributes(['style' => 'border-radius:1.5rem;overflow-hidden'])
                    ->imageHeight(100)
                    ->square(),
                TextColumn::make('title'),
                ToggleColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    TextInput::make('button_title'),
                    TextInput::make('button_link'),
                    FileUpload::make('cover_image')->disk('public')
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
