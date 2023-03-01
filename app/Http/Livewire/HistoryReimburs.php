<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reimbursement;
use App\Models\Payment;

class HistoryReimburs extends Component
{
    public $isModal = 0;

    public function render()
    {
        $this->reimburs = Reimbursement::orderBy('created_at', 'ASC')->get();
        return view('livewire.history-reimburs');
    }
    public function CloseModal()
    {
    $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
     $this->isModal = true; 
    }
    public function detail($id)
    {
        $reimburs = Reimbursement::select(
            "reimbursements.id as reimbursement_id",
            "reimbursements.user",
            "reimbursements.cost",
            "reimbursements.information as information_r",
            "reimbursements.status",
            "reimbursements.created_at as send_reimburs",
            "users.name",
            "payments.id as payment_id",
            "payments.id_reimbursement",
            "payments.created_at as send_payment",
            "payments.information as information_p",
            "payments.image as image_payment",
            )->join("users", "users.id", "=", "reimbursements.user"
            )->join("payments", "payments.id_reimbursement", "=", "reimbursements.id")->find($id);
        $this->id_reimburs = $id;
        $this->id_payment = $reimburs->payment_id;
        $this->a = $reimburs->name;
        $this->b = $reimburs->cost;
        $this->c = $reimburs->information_r;
        $this->d = $reimburs->send_reimburs;
        $this->e = $reimburs->status;
        $this->f = $reimburs->information_p;
        $this->g = $reimburs->image_payment;
        $this->OpenModal();
    }

    public function store(){
        Reimbursement::updateOrCreate(['id' => $this->id_reimburs],[
            'status' => "3",    
        ]);
        Payment::updateOrCreate(['id' => $this->id_payment],[
            'status' => "1",    
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', 'has been claim');
        $this->CloseModal(); //TUTUP MODAL
    }
}
