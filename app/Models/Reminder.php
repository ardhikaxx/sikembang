<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminder';

    protected $fillable = [
        'ibu_id',
        'judul',
        'deskripsi',
        'jenis',
        'tanggal',
        'jam',
        'is_berulang',
        'frekuensi',
        'is_aktif',
        'is_selesai',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'datetime:H:i',
        'is_berulang' => 'boolean',
        'is_aktif' => 'boolean',
        'is_selesai' => 'boolean',
    ];

    public function ibu()
    {
        return $this->belongsTo(User::class, 'ibu_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true)->where('is_selesai', false);
    }
}
