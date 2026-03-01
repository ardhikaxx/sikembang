<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatatanKehamilan extends Model
{
    protected $table = 'catatan_kehamilan';

    protected $fillable = [
        'ibu_id',
        'tanggal_periksa',
        'usia_kehamilan',
        'berat_badan',
        'tekanan_darah',
        'denyut_janin',
        'tinggi_fundus',
        'kadar_hb',
        'keluhan',
        'hasil_lab',
        'catatan_tambahan',
    ];

    protected $casts = [
        'tanggal_periksa' => 'date',
    ];

    public function ibu()
    {
        return $this->belongsTo(User::class, 'ibu_id');
    }
}
