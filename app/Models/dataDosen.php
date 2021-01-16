<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataDosen extends Model
{
    use HasFactory;
    protected $table = 'data_dosen';
    protected $fillable = [
        'nip', 'name', 'password',
    ];
}
