<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;

class Payments extends Component
{
    public function render()
    {
        $this->payment = payment::orderBy('created_at', 'DESC')->get();
        return view('livewire.payments');
    }
}
