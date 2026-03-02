<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Exports\DataIbuExport;
use App\Exports\BookingExport;
use App\Exports\KonsultasiExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportIbuExcel()
    {
        return Excel::download(new DataIbuExport(), 'data_ibu_hamil_' . date('Y-m-d') . '.xlsx');
    }
    
    public function exportBookingExcel()
    {
        return Excel::download(new BookingExport(), 'data_booking_' . date('Y-m-d') . '.xlsx');
    }
    
    public function exportKonsultasiExcel()
    {
        return Excel::download(new KonsultasiExport(), 'data_konsultasi_' . date('Y-m-d') . '.xlsx');
    }
}
