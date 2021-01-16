<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataMhs;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Data_Mhs extends Component
{
	public $nim, $name, $password;

    public function render()
    {
		$val_dataMhs = dataMhs::latest()->paginate(6);
        return view('livewire.data-mhs', compact('val_dataMhs'));
    }

    public function store()
    {
        $this->validate([
            'nim' => 'required|integer',
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

		$nid = intval($this->id);
        $roles = 'mahasiswa';

        dataMhs::updateOrCreate(['nim' => $this->nim], [
            'nim' => $this->nim,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        User::updateOrCreate(['username' => $this->nim], [
            'username' => $this->nim,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'roles' => $roles,
        ]);

        session()->flash('message', $this->id ? $this->nim . ' Diperbaharui' : $this->nim . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
		$nid = intval($id);
        $data = dataMhs::findOrFail($nid);
        $this->id = $nid;
        $this->nim = $data->nim;
        $this->name = $data->name;
        $this->password = $data->password;
    }

    public function resetFields()
    {
		$this->nim = '';
		$this->name = '';
		$this->password = '';
    }

    public function delete($id)
    {
        $data = dataMhs::find($id);
        $data->delete();
        session()->flash('message', $data->nim . ' Dihapus');
    }
}
