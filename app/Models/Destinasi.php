<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;
use App\Models\Wishlist;
use App\Models\User;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'foto2',
        'foto3',
        'foto4',
        'deskripsi',
        'kategori_id',
        'latitude',
        'longitude',
        'maps',
        'operasional',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $guarded = ['id'];

    protected $table = 'destinasis';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function wishlist()
    {
        return $this->belongsToMany(Wishlist::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
