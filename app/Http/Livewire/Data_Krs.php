<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataKrs;
use App\Models\dataKuliah;
use App\Models\dataMatkul;
use Illuminate\Support\Facades\Auth;

class Data_Krs extends Component
{
    public $nim,$kode_mk,$nama_mk,$kelas,$hari,$pukul,$ruang,$sks;

    public function render()
    {
        $a = Auth::user()->username;
        $val_dataKrs = dataKrs::where(['nim' => $a])->get();
        $val_dataKul = dataKuliah::all();
        return view('livewire.data-krs', compact('val_dataKrs'), compact('val_dataKul'));
    }

    public function srcdata(){
        $datakl = dataKuliah::where(['kode_mk' => $this->kode_mk],['kelas' => $this->kelas])->get();
        $datamk = dataMatkul::where(['kode_mk' => $this->kode_mk])->get();

        foreach($datakl as $row){
            $this->hari = $row->hari;
            $this->pukul = $row->pukul;
            $this->ruang = $row->ruang;
        }

        foreach($datamk as $row){
            $this->nama_mk = $row->nama_mk;
            $this->sks = $row->sks;
        }
    }

    public function store()
    {
        $this->validate([
        	'kode_mk' => 'required|string',
        	'kelas' => 'required|integer'
        ]);

        $nid = intval($this->id);
        $this->srcdata();

        dataKrs::updateOrCreate(['id' => $nid], [
        	'nim' => Auth::user()->username,
        	'kode_mk' => $this->kode_mk,
        	'nama_mk' => $this->nama_mk,
        	'kelas' => $this->kelas,
        	'hari' => $this->hari,
        	'pukul' => $this->pukul,
        	'ruang' => $this->ruang,
            'sks' => $this->sks,
            'status' => 'belum_disetujui',
            'skor' => 0,
            'nilai' => 0
        ]);

        session()->flash('message', $this->id ? $this->id . ' Diperbaharui' : $this->id . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
		$nid = intval($id);
        $data = dataKrs::findOrFail($nid);
        $this->id = $nid;
        $this->nim = $data->nim;
        $this->kode_mk = $data->kode_mk;
        $this->nama_mk = $data->nama_mk;
        $this->kelas = $data->kelas;
        $this->hari = $data->hari;
        $this->pukul = $data->pukul;
        $this->ruang = $data->ruang;
        $this->sks = $data->sks;
    }

    public function resetFields()
    {
        $this->nim = '';
        $this->kode_mk = '';
        $this->nama_mk = '';
        $this->kelas = '';
        $this->hari = '';
        $this->pukul = '';
        $this->ruang = '';
        $this->sks = '';
    }

    public function delete($id)
    {
        $data = dataKrs::findOrFail($id);
        $data->delete();
        session()->flash('message', $data->id . ' Dihapus');
    }
}
