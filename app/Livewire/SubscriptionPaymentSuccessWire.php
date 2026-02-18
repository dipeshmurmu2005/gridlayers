<?php

namespace App\Livewire;

use Livewire\Component;

class SubscriptionPaymentSuccessWire extends Component
{
    public function mount()
    {
        $this->checkPayment();
    }

    public function checkPayment()
    {
        dd('payment success');
    }

    public function render()
    {
        return view('livewire.subscription-payment-success-wire');
    }
}
