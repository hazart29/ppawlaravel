<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $fillable = [
        'nim', 'kode_mk', 'kelas', 'dosen', 'presensi', 'n_tugas', 'n_uts', 'n_uas'
    ];
}
