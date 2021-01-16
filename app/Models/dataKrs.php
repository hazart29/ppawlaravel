<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKrs extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim','kode_mk','nama_mk','kelas','hari','pukul','ruang','sks','status','skor','nilai'
    ];
}
