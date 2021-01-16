<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataKuliah;

class Data_Kuliah extends Component
{
    public $kode_mk, $kelas, $nip, $hari, $pukul, $ruang;

    public function render()
    {
		$val_dataKuliah = dataKuliah::latest()->paginate(6);
        return view('livewire.data-kuliah', compact('val_dataKuliah'));
    }

    public function store()
    {
        $this->validate([
            'kelas' => 'required|integer',
            'kode_mk' => 'required|string',
            'nip' => 'required|integer',
            'hari' => 'required|string',
            'pukul' => 'required|string',
            'ruang' => 'required|string'
        ]);

		$nid = intval($this->id);

        dataKuliah::updateOrCreate(['kode_mk' => $this->kode_mk], [
            'kelas' => $this->kelas,
            'kode_mk' => $this->kode_mk,
            'nip' => $this->nip,
            'hari' => $this->hari,
            'pukul' => $this->pukul,
            'ruang' => $this->ruang
        ]);

        session()->flash('message', $this->id ? $this->kelas . ' ' . $this->kode_mk . ' Diperbaharui' :  $this->kelas . ' ' . $this->kode_mk . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
		$nid = intval($id);
        $data = dataKuliah::findOrFail($nid);
        $this->id = $nid;
        $this->kelas = $data->kelas;
        $this->kode_mk = $data->kode_mk;
        $this->nip = $data->nip;
        $this->hari = $data->hari;
        $this->pukul = $data->pukul;
        $this->ruang = $data->ruang;
    }

    public function resetFields()
    {
		$this->kelas = '';
        $this->kode_mk = '';
		$this->nip = '';
        $this->hari = '';
        $this->pukul = '';
        $this->ruang = '';
    }

    public function delete($id)
    {
        $data = dataKuliah::findOrFail($id);
        $data->delete();
        session()->flash('message', $data->kelas . ' Dihapus');
    }
}
