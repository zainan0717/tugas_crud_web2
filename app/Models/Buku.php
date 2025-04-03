<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kodebuku',
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'foto_cover'
    ];
}