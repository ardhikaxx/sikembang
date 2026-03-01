<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'role',
        'foto_profil',
        'no_hp',
        'is_aktif',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function profilIbuHamil()
    {
        return $this->hasOne(ProfilIbuHamil::class, 'user_id');
    }

    public function profilBidan()
    {
        return $this->hasOne(ProfilBidan::class, 'user_id');
    }

    public function konsultasiSebagaiIbu()
    {
        return $this->hasMany(Konsultasi::class, 'ibu_id');
    }

    public function konsultasiSebagaiBidan()
    {
        return $this->hasMany(Konsultasi::class, 'bidan_id');
    }

    public function pesanKonsultasi()
    {
        return $this->hasMany(PesanKonsultasi::class, 'pengirim_id');
    }

    public function bookingSebagaiIbu()
    {
        return $this->hasMany(Booking::class, 'ibu_id');
    }

    public function bookingSebagaiBidan()
    {
        return $this->hasMany(Booking::class, 'bidan_id');
    }

    public function catatanKehamilan()
    {
        return $this->hasMany(CatatanKehamilan::class, 'ibu_id');
    }

    public function penilaianRisiko()
    {
        return $this->hasMany(PenilaianRisiko::class, 'ibu_id');
    }

    public function reminder()
    {
        return $this->hasMany(Reminder::class, 'ibu_id');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'user_id');
    }

    public function kontenEdukasi()
    {
        return $this->hasMany(KontenEdukasi::class, 'bidan_id');
    }

    public function isIbuHamil()
    {
        return $this->role === 'ibu_hamil';
    }

    public function isBidan()
    {
        return $this->role === 'bidan';
    }
}
