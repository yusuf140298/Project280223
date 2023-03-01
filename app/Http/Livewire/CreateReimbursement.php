<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reimbursement;

class CreateReimbursement extends Component
{
    public function render()
    {
        return view('livewire.create-reimbursement');
    }
}
