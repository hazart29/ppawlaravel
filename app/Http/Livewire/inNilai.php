<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\nilai;
use App\Models\dataKrs;
use Illuminate\Support\Facades\Auth;

class inNilai extends Component
{
    public $tugas,$uts,$uas,$idd;
    public function render()
    {
        $nip = Auth::user()->username;
        $datanilai = nilai::where(['dosen' => $nip])->get();
        return view('livewire.nilai', compact('datanilai'));
    }

    public function store()
    {
        $this->validate([
            'tugas' => 'required|integer',
            'uts' => 'required|integer',
            'uas' => 'required|integer',
        ]);

        $data = nilai::findOrFail($this->idd);
        $data->n_tugas = $this->tugas;
        $data->n_uts = $this->uts;
        $data->n_uas = $this->uas;
        $data->save();

        session()->flash('message', $this->idd ? $this->id . ' Diperbaharui' : $this->idd . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
        $nid = intval($id);
        $this->idd = $nid;
        $data = nilai::findOrFail($nid);
        $this->id = $nid;
        $this->tugas = $data->n_tugas;
        $this->uts = $data->n_uts;
        $this->uas = $data->n_uas;
    }

    public function resetFields()
    {
		$this->tugas = '';
		$this->uts = '';
		$this->uas = '';
    }

    public function hitung($id){
        $nid = intval($id);
        $data = nilai::findOrFail($nid);
        $tugas = $data->tugas;
        $presensi = $data->presensi;
        $uts = $data->uts;
        $uas = $data->uas;
        $skor = (($presensi/14)*0.25)+($tugas*0.25)+($uts*0.25)+($uas*0.25);
        $nilai =0;
        if($skor>=85 && $skor<=100){
            $nilai = 'A';
        }else if($skor>=70 && $skor<85){
            $nilai = 'B';
        }else if($skor>=50 && $skor<70){
            $nilai = 'C';
        }else if($skor>=35 && $skor<50){
            $nilai = 'D';
        }else{
            $nilai = 'E';
        }

        $krs = dataKrs::where(['nim' => $data->nim], ['kode_mk' => $data->kode_mk], ['kelas' => $data->kelas])->first();
        $krs->skor = $skor;
        $krs->nilai = $nilai;
        $krs->save();

        session()->flash('message', $nid . ' Berhasil Dihitung');
        $this->resetFields();
    }
}
