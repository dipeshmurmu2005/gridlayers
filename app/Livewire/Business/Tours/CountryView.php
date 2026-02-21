<?php

namespace App\Livewire\Business\Tours;

use App\Enums\Business\Tours\PackageStatusEnum;
use App\Models\Business\Tours\Country;
use App\Models\Business\Tours\Package;
use App\Models\Business\Tours\PackageDestination;
use App\Services\ThemeResolver;
use Livewire\Attributes\Url;
use Livewire\Component;

class CountryView extends Component
{
    public $country;

    #[Url()]
    public $slug;

    public $packages;

    public $destinations;

    public function mount()
    {
        $this->country = Country::where('slug', $this->slug)->where('status', true)->first();
        $this->destinations = $this->country->destinations()->where('status', true)->get();
        $available_packages = PackageDestination::whereIn('destination_id', $this->country->destinations()->pluck('id')->toArray())
            ->distinct()
            ->pluck('package_id')
            ->toArray();
        $this->packages = Package::where('status', PackageStatusEnum::ACTIVE)->whereIn('id', $available_packages)->get();
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('country-view');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
