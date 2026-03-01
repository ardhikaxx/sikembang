<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranKonsultasi extends Model
{
    protected $table = 'lampiran_konsultasi';

    protected $fillable = [
        'pesan_id',
        'nama_file',
        'path_file',
        'tipe_file',
        'ukuran_file',
    ];

    public function pesan()
    {
        return $this->belongsTo(PesanKonsultasi::class, 'pesan_id');
    }
}
