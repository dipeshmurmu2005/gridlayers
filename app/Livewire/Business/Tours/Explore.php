<?php

namespace App\Livewire\Business\Tours;

use App\Enums\Business\Tours\PackageStatusEnum;
use App\Models\Business\Tours\Country;
use App\Models\Business\Tours\Package;
use App\Models\Business\Tours\Page;
use App\Services\ThemeResolver;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Explore extends Component
{
    use WithPagination;
    #[Url]
    public $type;

    #[Url]
    public $duration;

    #[Url]
    public $destination;

    #[Url]
    public $query;

    public $price_high_to_low = false;

    public $offers = false;

    public $countries;

    public $selected_countries = [];

    public $page;

    #[Url()]
    public $max_budget;

    public function mount()
    {
        $this->countries = Country::latest()->pluck('name', 'id');
        $this->page = Page::where('page', 'explore')->first();
    }

    #[Computed()]
    public function packages()
    {
        $type = $this->type;
        $minduration = null;
        $maxduration = null;
        $destination = $this->destination;
        $max_budget = $this->max_budget;
        $query = $this->query;
        $selected_countries = $this->selected_countries;
        if ($this->duration) {
            if (preg_match('/^\d+\+$|^\d+-\d+$/', $this->duration)) {
                if (str_ends_with($this->duration, '+')) {
                    $minduration = (int) rtrim($this->duration, '+');
                } else {
                    [$minduration, $maxduration] = explode('-', $this->duration);
                }
            }
        }
        $packages = Package::where('status', PackageStatusEnum::ACTIVE)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->when($this->type != null, function ($query) use ($type) {
                $query->where('type', $type);
            })
            ->when($this->destination != null, function ($query) use ($destination) {
                $query->whereHas('destinations', function ($query) use ($destination) {
                    $query->where('destinations.id', $destination);
                });
            })
            ->when(count($selected_countries) > 0, function ($query) use ($selected_countries) {
                $query->whereHas('destinations', function ($query) use ($selected_countries) {
                    $query->whereIn('destinations.country_id', $selected_countries);
                });
            })
            ->when($minduration != null || $maxduration != null, function ($query) use ($minduration, $maxduration) {
                if ($maxduration == null) {
                    $query->where('duration_days', '>=', $minduration);
                } else {
                    $query->whereBetween('duration_days', [$minduration, $maxduration]);
                }
            })
            ->when($this->offers, function ($query) {
                $query->where('is_offer', true);
            })
            ->when(!$this->price_high_to_low, function ($query) {
                $query->orderBy('discounted_price', 'asc');
            })
            ->when($this->price_high_to_low, function ($query) {
                $query->orderBy('discounted_price', 'desc');
            })
            ->when($this->max_budget > 0, function ($query) use ($max_budget) {
                $query->where('discount_price', '<=', $max_budget);
            })
            ->latest()
            ->paginate(9);
        return $packages;
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('explore');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
