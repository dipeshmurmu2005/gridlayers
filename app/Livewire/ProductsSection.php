<?php

namespace App\Livewire;

use App\Models\Business;
use Livewire\Component;

class ProductsSection extends Component
{
    public $business_types;

    public function mount()
    {
        $this->business_types = Business::latest()->get();
    }

    public function render()
    {
        return view('livewire.products-section');
    }
}
