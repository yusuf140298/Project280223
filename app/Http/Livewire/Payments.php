<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use App\Models\Reimbursement;
use Livewire\WithFileUploads;


class Payments extends Component
{
    use WithFileUploads;
    public $send, $payment, $information, $image;

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
        )->join("users", "users.id","=", "reimbursements.user")->where('status', '1')->get();
        $this->payments = payment::select(
            "payments.id as id_payment",
            "payments.id_reimbursement",
            "payments.information as information_pay",
            "payments.payment",
            "payments.image",
            "payments.status as status_payment",
            "payments.created_at",
            "reimbursements.user",
            "users.name"
        )->join("reimbursements", "reimbursements.id" ,"=", "payments.id_reimbursement"
        )->join("users","users.id","=","reimbursements.user")->orderBy('created_at', 'DESC')->get();
        return view('livewire.payments');
    }

    public function submit(){
        $this->validate([
            'send' => 'required',
            'payment' => 'required',
            'information' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,pdf,png|max:2048',
        ]);

        // $dataValid['image'] = $this->image->store('reimbursement', 'public');
        payment::create([
            'id_reimbursement' => $this->send,
            'send_from_user' => "1",
            'information' => $this->information,
            'payment' => $this->payment,
            'image' => $this->image->store('reimbursement', 'public'),
            'status' => "0",
            ]);
        session()->flash('message', 'Send Payment to Process');
        
    }
}
