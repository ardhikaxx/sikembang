<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $bookings = Booking::with(['ibu', 'bidan'])->get();
        
        $data = $bookings->map(function ($booking) {
            return [
                'Ibu' => $booking->ibu->nama_lengkap ?? '-',
                'Bidan' => $booking->bidan->nama_lengkap ?? '-',
                'Tanggal' => $booking->tanggal_booking->format('d-m-Y'),
                'Jam' => $booking->jam_booking,
                'Jenis' => ucfirst($booking->jenis),
                'Status' => ucfirst(str_replace('_', ' ', $booking->status)),
            ];
        });
        
        return $data;
    }
    
    public function headings(): array
    {
        return [
            'Ibu',
            'Bidan',
            'Tanggal',
            'Jam',
            'Jenis',
            'Status',
        ];
    }
}
