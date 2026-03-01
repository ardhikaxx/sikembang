<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontenEdukasi extends Model
{
    protected $table = 'konten_edukasi';

    protected $fillable = [
        'kategori_id',
        'bidan_id',
        'judul',
        'slug',
        'konten',
        'gambar',
        'trimester',
        'minggu_ke',
        'is_published',
        'views',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriEdukasi::class, 'kategori_id');
    }

    public function bidan()
    {
        return $this->belongsTo(User::class, 'bidan_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeForTrimester($query, $trimester)
    {
        return $query->where(function($q) use ($trimester) {
            $q->where('trimester', $trimester)->orWhere('trimester', 'semua');
        });
    }
}
