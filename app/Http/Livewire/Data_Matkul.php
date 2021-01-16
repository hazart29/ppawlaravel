<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataMatkul;

class Data_Matkul extends Component
{
    public $kode_mk, $nama_mk, $sks;

    public function render()
    {
		$val_dataMatkul = dataMatkul::latest()->paginate(6);
        return view('livewire.data-matkul', compact('val_dataMatkul'));
    }

    public function store()
    {
        $this->validate([
            'kode_mk' => 'required|string',
            'nama_mk' => 'required|string',
            'sks' => 'required|string'
        ]);

		$nid = intval($this->id);

        dataMatkul::updateOrCreate(['kode_mk' => $this->kode_mk], [
            'kode_mk' => $this->kode_mk,
            'nama_mk' => $this->nama_mk,
            'sks' => $this->sks
        ]);

        session()->flash('message', $this->id ? $this->kode_mk . ' Diperbaharui' : $this->kode_mk . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
		$nid = intval($id);
        $data = dataMatkul::findOrFail($nid);
        $this->id = $nid;
        $this->kode_mk = $data->kode_mk;
        $this->nama_mk = $data->nama_mk;
        $this->sks = $data->sks;
    }

    public function resetFields()
    {
		$this->kode_mk = '';
		$this->nama_mk = '';
		$this->sks = '';
    }

    public function delete($id)
    {
        $data = dataMatkul::findOrFail($id);
        $data->delete();
        session()->flash('message', $data->kode_mk . ' Dihapus');
    }
}
