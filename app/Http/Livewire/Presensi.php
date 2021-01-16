<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\nilai;
use Illuminate\Support\Facades\Auth;

class Presensi extends Component
{
    public $presensi,$idd;
    public function render()
    {
        $nip = Auth::user()->username;
        $datanilai = nilai::where(['dosen' => $nip])->get();
        return view('livewire.presensi', compact('datanilai'));
    }

    public function store()
    {
        $this->validate([
            'presensi' => 'required|string'
        ]);

        $data = nilai::findOrFail($this->idd);
        $data->presensi = $this->presensi;
        $data->save();

        session()->flash('message', $this->id ? $this->id . ' Diperbaharui' : $this->id . ' Ditambahkan');
        $this->resetFields();
    }

    public function edit($id)
    {
        $nid = intval($id);
        $this->idd = $nid;
        $data = nilai::findOrFail($nid);
        $this->id = $nid;
        $this->presensi = $data->presensi;
    }

    public function resetFields()
    {
		$this->presensi = '';
    }
}
