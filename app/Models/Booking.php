<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'ibu_id',
        'bidan_id',
        'tanggal_booking',
        'jam_booking',
        'jenis',
        'keluhan',
        'status',
        'catatan_bidan',
        'alasan_tolak',
    ];

    protected $casts = [
        'tanggal_booking' => 'date',
        'jam_booking' => 'datetime:H:i',
    ];

    public function ibu()
    {
        return $this->belongsTo(User::class, 'ibu_id');
    }

    public function bidan()
    {
        return $this->belongsTo(User::class, 'bidan_id');
    }

    public function jadwalUlang()
    {
        return $this->hasOne(JadwalUlangBooking::class, 'booking_id');
    }

    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function scopeDiterima($query)
    {
        return $query->where('status', 'diterima');
    }
}
