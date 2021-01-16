<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataDosen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Data_Dosen extends Component
{
    public $nip, $name, $password;

    public function render()
    {
		$val_dataDosen = dataDosen::latest()->paginate(6);
        return view('livewire.data-dosen', compact('val_dataDosen'));
    }

    public function store()
    {
        $this->validate([
            'nip' => 'required|integer',
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $nid = intval($this->id);
        $roles = 'dosen';

        DataDosen::updateOrCreate(['nip' => $this->nip], [
            'nip' => $this->nip,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        User::updateOrCreate(['username' => $this->nip], [
            'username' => $this->nip,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'roles' => $roles,
        ]);

        session()->flash('message', $this->id ? $this->nip . ' Diperbaharui' : $this->nip . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
		$nid = intval($id);
        $data = DataDosen::findOrFail($nid);
        $this->id = $nid;
        $this->nip = $data->nip;
        $this->name = $data->name;
        $this->password = $data->password;
    }

    public function resetFields()
    {
		$this->nip = '';
		$this->name = '';
		$this->password = '';
    }

    public function delete($id)
    {
        $data = DataDosen::findOrFail($id);
        $data->delete();
        session()->flash('message', $data->nip . ' Dihapus');
    }
}
