<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function destinasi()
    {
        return $this->hasMany(Destinasi::class,'wilayah_id');
    }
}
