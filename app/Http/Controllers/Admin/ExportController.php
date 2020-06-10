<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\PendaftarZonaExport;
use App\Exports\PendaftarNonZonaExport;
use App\Exports\PendaftarAllExport;
use Maatwebsite\Excel\Facades\Excel;



class ExportController extends Controller
{

    public function ExportDataZona()
    {
        return (new PendaftarZonaExport(function ($sheet) {
        }))->download('data-zona.xlsx');
    }

    public function ExportDataNonZona()
    {
        return (new PendaftarNonZonaExport(function ($sheet) {
        }))->download('data-non-zona.xlsx');
    }

    public function ExportAll()
    {
        return (new PendaftarAllExport(function ($sheet) {
        }))->download('All-Data.xlsx');
    }
}
