<?php

namespace App\Livewire\Business\Tours;

use App\Models\Business\Tours\Destination;
use App\Services\ThemeResolver;
use Livewire\Attributes\Url;
use Livewire\Component;

class DestinationView extends Component
{
    #[Url()]
    public $slug;
    public $destination;
    public $seo;

    public function mount()
    {
        $this->destination = Destination::where('slug', $this->slug)->where('status', true)->first();
        if (!$this->destination) {
            abort(404);
            return;
        }
        $this->seo = (object) [
            'meta_title' => 'Explore ' . $this->destination->name . ' | ' . $this->destination->country->name,
            'title' => 'Explore ' . $this->destination->name . ' | ' . $this->destination->country->name,
            'meta_keywords' => $this->destination->keywords,
            'canonical_url' => null,
            'index' => true,
            'follow' => true,
            'og_type' => null,
            'og_image' => $this->destination->cover_image,
            'twitter_card' => null,
            'twitter_image' => $this->destination->cover_image,
            'schema_markup' => null,
            'extra_meta' => null,
            'meta_description' => $this->destination->short_description,
        ];
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('destination-view');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
