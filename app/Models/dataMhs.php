<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMhs extends Model
{
    use HasFactory;
    protected $table = 'data_mhs';
    protected $fillable = [
        'nim', 'name', 'password', 'roles'
    ];

}
