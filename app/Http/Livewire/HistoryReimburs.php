<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reimbursement;

class HistoryReimburs extends Component
{
    public $isModal = 0;

    public function render()
    {
        $this->reimburs = Reimbursement::orderBy('created_at', 'ASC')->get();
        return view('livewire.history-reimburs');
    }
    public function closeModal()
    {
        return $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
     $this->isModal = true;
    }
}
