<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';

    protected $fillable = [
        'ibu_id',
        'bidan_id',
        'judul',
        'status',
        'is_read_bidan',
        'is_read_ibu',
    ];

    protected $casts = [
        'is_read_bidan' => 'boolean',
        'is_read_ibu' => 'boolean',
    ];

    public function ibu()
    {
        return $this->belongsTo(User::class, 'ibu_id');
    }

    public function bidan()
    {
        return $this->belongsTo(User::class, 'bidan_id');
    }

    public function pesan()
    {
        return $this->hasMany(PesanKonsultasi::class, 'konsultasi_id');
    }

    public function pesanTerakhir()
    {
        return $this->hasOne(PesanKonsultasi::class, 'konsultasi_id')->latest();
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}
