<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriEdukasi extends Model
{
    protected $table = 'kategori_edukasi';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'icon',
        'urutan',
    ];

    public function kontenEdukasi()
    {
        return $this->hasMany(KontenEdukasi::class, 'kategori_id');
    }
}
