<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'nip',
        'nama',
        'jk',
        'tgl_lahir',
        'foto'
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
];
}
