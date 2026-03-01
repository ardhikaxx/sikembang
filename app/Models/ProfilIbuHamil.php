<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilIbuHamil extends Model
{
    protected $table = 'profil_ibu_hamil';

    protected $fillable = [
        'user_id',
        'tanggal_lahir',
        'usia',
        'hpht',
        'hpl',
        'golongan_darah',
        'rhesus',
        'berat_sebelum',
        'tinggi_badan',
        'alamat',
        'riwayat_penyakit',
        'riwayat_alergi',
        'kehamilan_ke',
        'anak_hidup',
        'keguguran',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'hpht' => 'date',
        'hpl' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUsiaKehamilanAttribute()
    {
        if (!$this->hpht) {
            return null;
        }
        $hpht = new \DateTime($this->hpht);
        $today = new \DateTime();
        $diff = $hpht->diff($today);
        $totalDays = $diff->days;
        $weeks = floor($totalDays / 7);
        $days = $totalDays % 7;
        return ['minggu' => $weeks, 'hari' => $days];
    }

    public function getTrimesterAttribute()
    {
        $usia = $this->usia_kehamilan;
        if (!$usia) return null;
        if ($usia <= 13) return 1;
        if ($usia <= 27) return 2;
        return 3;
    }

    public function hitungHPL()
    {
        if (!$this->hpht) return null;
        $hpht = new \DateTime($this->hpht);
        $hpht->modify('+280 days');
        return $hpht->format('Y-m-d');
    }

    public function hitungUsiaKehamilan()
    {
        if (!$this->hpht) return ['minggu' => 0, 'hari' => 0];
        $hpht = new \DateTime($this->hpht);
        $today = new \DateTime();
        $diff = $hpht->diff($today);
        $totalDays = $diff->days;
        $weeks = floor($totalDays / 7);
        $days = $totalDays % 7;
        return ['minggu' => $weeks, 'hari' => $days];
    }
}
