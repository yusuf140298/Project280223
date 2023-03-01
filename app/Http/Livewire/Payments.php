<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use App\Models\User;
use Livewire\WithFileUploads;


class Payments extends Component
{
    use WithFileUploads;
    public $send, $payment, $information, $image;

    public function render()
    {
        $this->payments = payment::orderBy('created_at', 'DESC')->get();
        $this->user = user::where('level', '2')->get();
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
            'send_to_user' => $this->send,
            'send_from_user' => "1",
            'information' => $this->information,
            'payment' => $this->payment,
            'image' => $this->image->store('reimbursement', 'public'),
            'status' => "0",
            ]);
        session()->flash('message', 'Send Payment to Process');
        
    }
}
