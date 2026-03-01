<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalUlangBooking extends Model
{
    protected $table = 'jadwal_ulang_booking';

    protected $fillable = [
        'booking_id',
        'tanggal_baru',
        'jam_baru',
        'alasan',
    ];

    protected $casts = [
        'tanggal_baru' => 'date',
        'jam_baru' => 'datetime:H:i',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
