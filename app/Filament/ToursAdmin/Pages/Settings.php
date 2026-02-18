<?php

namespace App\Filament\ToursAdmin\Pages;

use App\Enums\Business\Tours\SocialLinkEnum;
use App\Models\Business\Tours\Setting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\Alignment;
use Filament\Support\Icons\Heroicon;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.tours-admin.pages.settings';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog6Tooth;

    public ?array $data = [];

    public function mount(): void
    {
        $setting = Setting::first();
        $this->form->fill();
        if ($setting) {
            $this->form->fill([
                'logo' => $setting->logo,
                'name' => $setting->name,
                'social_links' => $setting?->social_links ?? [],
                'whatsapp_credentials' => [$setting->whatsapp_credentials],
                'google_jsc' => $setting->google_jsc
            ]);
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Basic Information')->schema([
                FileUpload::make('logo')
                    ->required()
                    ->disk('public')
                    ->avatar()
                    ->columnSpanFull(),
                TextInput::make('name')
                    ->required()
                    ->label('Organization Name'),
                Repeater::make('social_links')->schema([
                    Select::make('media')
                        ->searchable()
                        ->required()
                        ->options(SocialLinkEnum::class),
                    TextInput::make('url')->required()
                ])->grid(5)
                    ->addActionAlignment(Alignment::Left)
            ])->columnSpanFull(),
        ];
    }

    public function create()
    {
        $data = $this->form->getState();
        $settings = Setting::updateOrCreate([
            'id' => 1
        ], $data);
        Notification::make()
            ->title('Setting Updated Successfully')
            ->success()
            ->send();
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }
}
