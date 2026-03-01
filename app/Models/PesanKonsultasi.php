<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanKonsultasi extends Model
{
    protected $table = 'pesan_konsultasi';

    protected $fillable = [
        'konsultasi_id',
        'pengirim_id',
        'pesan',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class, 'konsultasi_id');
    }

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    public function lampiran()
    {
        return $this->hasMany(LampiranKonsultasi::class, 'pesan_id');
    }
}
