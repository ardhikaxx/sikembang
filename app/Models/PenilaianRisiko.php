<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianRisiko extends Model
{
    protected $table = 'penilaian_risiko';

    protected $fillable = [
        'ibu_id',
        'bidan_id',
        'kategori_risiko',
        'skor_risiko',
        'faktor_risiko',
        'rekomendasi',
        'tanggal_penilaian',
    ];

    protected $casts = [
        'faktor_risiko' => 'array',
        'tanggal_penilaian' => 'date',
    ];

    public function ibu()
    {
        return $this->belongsTo(User::class, 'ibu_id');
    }

    public function bidan()
    {
        return $this->belongsTo(User::class, 'bidan_id');
    }

    public function getLatestRisikoAttribute()
    {
        return $this->orderBy('tanggal_penilaian', 'desc')->first();
    }
}
