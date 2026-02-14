<?php

namespace App\Livewire\Business\Tours;

use App\Services\ThemeResolver;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $themeResolver = ThemeResolver::page('home');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
