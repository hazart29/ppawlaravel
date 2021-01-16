<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataKuliah;
use App\Models\nilai;
use Illuminate\Support\Facades\Auth;

class Jadwal extends Component
{
    public function render()
    {
        $nip = Auth::user()->username;
        $kuliah = dataKuliah::where(['nip' => $nip])->get();
        $data = nilai::where(['dosen' => $nip])->get();
        return view('livewire.jadwal', compact('kuliah', 'data'));
    }

    public function detail($id){
        $nid = intval($id);
        $nip = Auth::user()->username;
        $kul = dataKuliah::findOrFail($nid);
        $kuliah = dataKuliah::where(['nip' => $nip])->get();
        $data = nilai::where(['kode_mk' => $kul->kode_mk], ['dosen' => $nip])->get();

        return view('livewire.jadwal', compact('kuliah', 'data'));
    }
}
