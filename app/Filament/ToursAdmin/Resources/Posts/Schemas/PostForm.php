<?php

namespace App\Filament\ToursAdmin\Resources\Posts\Schemas;

use App\Enums\Business\Tours\PostTypeEnum;
use App\Models\Business\Tours\Destination;
use App\Models\Business\Tours\Package;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page Details')->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('slug')
                        ->live()
                        ->afterStateUpdated(
                            fn($state, callable $set) =>
                            $set('slug', Str::slug(strtolower($state)))
                        )
                        ->required(),
                    Select::make('package_id')
                        ->hint('optional')
                        ->label('Package')
                        ->options(Package::pluck('title', 'id'))
                        ->searchable(),
                    Select::make('destination_id')
                        ->hint('optional')
                        ->label('Destination')
                        ->options(Destination::pluck('name', 'id'))
                        ->searchable(),
                    Select::make('type')->options(PostTypeEnum::class),
                    TextInput::make('seo_title')
                        ->label('Seo Title')
                        ->required(),
                    TextInput::make('seo_description')
                        ->label('Seo Description')
                        ->columnSpan(2)
                        ->required(),
                ])
                    ->columnSpanFull()
                    ->columns(4),
                Textarea::make('excerpt')
                    ->required()
                    ->label('Short Description')
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->required()
                    ->disk('public'),
            ]);
    }
}
