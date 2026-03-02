<?php

namespace App\Exports;

use App\Models\Konsultasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KonsultasiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $konsultasis = Konsultasi::with(['ibu', 'bidan'])->get();
        
        $data = $konsultasis->map(function ($konsultasi) {
            return [
                'Judul' => $konsultasi->judul,
                'Ibu' => $konsultasi->ibu->nama_lengkap ?? '-',
                'Bidan' => $konsultasi->bidan->nama_lengkap ?? '-',
                'Status' => ucfirst($konsultasi->status),
                'Tanggal' => $konsultasi->created_at->format('d-m-Y'),
            ];
        });
        
        return $data;
    }
    
    public function headings(): array
    {
        return [
            'Judul',
            'Ibu',
            'Bidan',
            'Status',
            'Tanggal',
        ];
    }
}
