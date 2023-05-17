<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'deskripsi',
        'jenis',
        

        
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $guarded = ['id'];

    protected $table = 'destinasis';

}
