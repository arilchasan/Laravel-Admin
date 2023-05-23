<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        'kategori',
        'nama',
        'alamat',
        'gambar'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $guarded = ['id'];
    protected $table = 'petas';
}
