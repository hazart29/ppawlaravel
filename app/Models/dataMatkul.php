<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMatkul extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_mk', 'nama_mk','sks'
    ];
}