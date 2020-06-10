<?php

namespace App\Exports;

use App\Models\CalonSiswa;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarZonaExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        $calonSiswa = $totalRegister  = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->orderBy('nomor_pendaftaran')->get();
        return view('exports.calon-peserta', ['CalonSiswa' => $calonSiswa]);
    }
}
