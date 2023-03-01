<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Users extends Component 
{
    public $users, $name, $email,  $level, $user_id;
    public $isModal = 0;

    public function render()
    {
        $this->user = User::orderBy('id', 'ASC')->get();
        return view('livewire.users');
    }

    //FUNGSI INI AKAN DIPANGGIL KETIKA TOMBOL TAMBAH ANGGOTA DITEKAN
    public function create()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();

    }

    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
    public function closeModal()
    {
        return $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
     $this->isModal = true;
    }

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->con_password = '';
        $this->level = '';
    }

    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'level' => 'required'
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'level' => $this->level,
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->user_id ? $this->name . 'has been changed': $this->name . ' has been added');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID User 
    public function edit($id)
    {
        $user = User::find($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->level = $user->level;

        $this->openModal(); //LALU BUKA MODAL
    }

    //FUNGSI INI UNTUK MENGHAPUS DATA
    public function delete($id)
    {
        $user = User::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $user->delete(); //LALU HAPUS DATA
        session()->flash('message', $user->name . ' has been Deleted'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }
}
