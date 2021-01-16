<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataKuliah;
use App\Models\dataMatkul;
use App\Models\dataDosen;

class AvaMatkul extends Component
{
    public function render()
    {
        $kuliah = dataKuliah::latest()->paginate(5);
        $matkul = dataMatkul::latest()->paginate(5);
        $dosen = dataDosen::latest()->paginate(5);
        return view('livewire.ava-matkul', compact('kuliah','matkul','dosen'));
    }
}
