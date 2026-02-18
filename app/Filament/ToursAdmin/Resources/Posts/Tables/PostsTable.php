<?php

namespace App\Filament\ToursAdmin\Resources\Posts\Tables;

use App\Enums\Business\Tours\PostStatusEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('type')->badge(),
                TextColumn::make('package.title')->placeholder('Not Found')->badge(),
                TextColumn::make('destination.name')->placeholder('Not Found')->badge(),
                TextColumn::make('status')->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('Publish/Unpublish')
                    ->label(fn($record) => $record->status == PostStatusEnum::PUBLISHED ? 'Unpublish' : 'Publish')
                    ->color(fn($record) => $record->status == PostStatusEnum::PUBLISHED ? 'warning' : 'success')
                    ->action(function ($record) {
                        $record->status = $record->status == PostStatusEnum::PUBLISHED ? PostStatusEnum::DRAFT : PostStatusEnum::PUBLISHED;
                        $record->save();
                    })
                    ->button(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
