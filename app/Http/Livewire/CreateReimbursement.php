<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Reimbursement;

class CreateReimbursement extends Component
{

    use WithFileUploads;
    public $name, $cost, $information, $image;
    public function render()
    {
        return view('livewire.create-reimbursement');
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'cost' => 'required',
            'information' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,pdf,png|max:2048',
        ]);

        // $dataValid['image'] = $this->image->store('reimbursement', 'public');
        Reimbursement::create([
            'user' => $this->name,
            'cost' => $this->cost,
            'information' => $this->information,
            'image' => $this->image->store('reimbursement', 'public'),
            'status' => "0",
            ]);
        session()->flash('message', 'File Uploaded');
        
    }
}
