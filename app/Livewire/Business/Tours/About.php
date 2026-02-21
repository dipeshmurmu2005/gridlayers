<?php

namespace App\Livewire\Business\Tours;

use App\Models\Business\Tours\Page;
use App\Services\ThemeResolver;
use Livewire\Component;

class About extends Component
{
    public $page;

    public function mount()
    {
        $this->page = Page::where('page', 'about')->first();
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('about');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
