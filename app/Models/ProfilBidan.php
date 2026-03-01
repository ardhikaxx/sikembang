<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilBidan extends Model
{
    protected $table = 'profil_bidan';

    protected $fillable = [
        'user_id',
        'no_str',
        'instansi',
        'spesialisasi',
        'pengalaman_tahun',
        'jadwal_praktek',
        'bio',
    ];

    protected $casts = [
        'jadwal_praktek' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
