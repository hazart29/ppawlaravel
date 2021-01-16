<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKuliah extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_mk', 'kelas', 'nip', 'hari', 'pukul', 'ruang' 
    ];
}
