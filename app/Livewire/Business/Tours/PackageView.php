<?php

namespace App\Livewire\Business\Tours;

use App\Enums\Business\Tours\PackageStatusEnum;
use App\Models\Business\Tours\Package;
use App\Services\ThemeResolver;
use Livewire\Attributes\Url;
use Livewire\Component;

class PackageView extends Component
{
    #[Url('slug')]
    public $slug;

    public $package;

    public function mount()
    {
        $this->package = Package::where('slug', $this->slug)->where('status', PackageStatusEnum::ACTIVE)->first();
        if (!$this->package) {
            abort(404);
        }
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('package-view');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
