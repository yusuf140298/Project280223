<?php

namespace App\Http\Livewire;
 
use Livewire\Component;
use App\Models\Reimbursement;


class Reimbursements extends Component
{
    public $id_reimburs,$status;
    public $isModal = 0;

    public function render()
    {
        $this->reimbursements = Reimbursement::select(
            "reimbursements.id as id_reimburs",
            "reimbursements.user",
            "reimbursements.cost",
            "reimbursements.information",
            "reimbursements.image",
            "reimbursements.status",
            "users.name as user"
        )->join("users", "users.id","=", "reimbursements.user")->get();
        return view('livewire.reimbursements');
    }

    public function OpenModal()
    {
        $this->isModal = true;
    }

    public function CloseModal()
    {
        $this->isModal = false;
    }
    
    public function confirm($id)
    {
        $reimburs = Reimbursement::find($id);
        $this->id_reimburs = $id;
        $this->status = $reimburs->status;

        $this->OpenModal();
    }
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'status' => 'required'
        ]);

    
        Reimbursement::updateOrCreate(['id' => $this->id_reimburs], [
            'status' => $this->status,
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->status . 'has been changed');
        $this->CloseModal(); //TUTUP MODAL
    }

}
