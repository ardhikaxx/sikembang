<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataIbuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $ibus = User::where('role', 'ibu_hamil')->with('profilIbuHamil')->get();
        
        $data = $ibus->map(function ($ibu) {
            $profil = $ibu->profilIbuHamil;
            return [
                'Nama' => $ibu->nama_lengkap,
                'Email' => $ibu->email,
                'HP' => $ibu->no_hp,
                'Tanggal Lahir' => $profil && $profil->tanggal_lahir ? $profil->tanggal_lahir->format('d-m-Y') : '-',
                'HPHT' => $profil && $profil->hpht ? $profil->hpht->format('d-m-Y') : '-',
                'HPL' => $profil && $profil->hpl ? $profil->hpl->format('d-m-Y') : '-',
                'Golongan Darah' => $profil ? $profil->golongan_darah . $profil->rhesus : '-',
                'Alamat' => $profil ? $profil->alamat : '-',
            ];
        });
        
        return $data;
    }
    
    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'HP',
            'Tanggal Lahir',
            'HPHT',
            'HPL',
            'Golongan Darah',
            'Alamat',
        ];
    }
}
