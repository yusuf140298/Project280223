<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reimbursement;


class Reimbursements extends Component
{
    public function render()
    {
        $this->reimbursement = Reimbursement::orderBy('created_at', 'DESC')->get();
        return view('livewire.reimbursements');
    }
}
