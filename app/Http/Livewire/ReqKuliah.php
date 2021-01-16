<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataKrs;
use App\Models\nilai;
use Illuminate\Support\Facades\Auth;

class ReqKuliah extends Component
{
    public function render()
    {
        $dosen = Auth::user()->username;
        $val_dataKrs = dataKrs::where(['dosen' => $dosen])->get();
        return view('livewire.req-kuliah', compact('val_dataKrs'));
    }

    public function approve($id){
        $nid = intval($id);
        $data = dataKrs::findOrFail($nid);
        nilai::create([
            'nim' => $data->nim,
            'kode_mk' => $data->kode_mk,
            'kelas' => $data->kelas,
            'dosen' => $data->dosen,
            'presensi' => 0,
            'n_tugas' => 0,
            'n_uts' => 0,
            'n_uas' => 0,
        ]);

        $data->status = 'disetujui';
        $data->save();

        session()->flash('message', $data->nim . ' Telah diapprove');
    }
}
