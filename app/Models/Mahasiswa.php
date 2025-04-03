<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jk',
        'prodi',
        'tgl_lahir',
        'nonreg'
    ];
    
    protected $casts = [
        'tgl_lahir' => 'date',
        'nonreg' => 'boolean'
    ];
}
