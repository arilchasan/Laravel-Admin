<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Destinasi extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'foto2',
        'foto3',
        'foto4',
        'deskripsi',
        'kategori_id',
        'wilayah_id',
        'status',
        'latitude',
        'longitude',
        'maps',
        'operasional',
        'pelayanan'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'destinasis';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

}
