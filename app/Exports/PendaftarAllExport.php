<?php

namespace App\Exports;

use App\Models\CalonSiswa;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarAllExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        $calonSiswa = $totalRegister  = CalonSiswa::orderBy('nomor_pendaftaran')->get();
        return view('exports.calon-peserta', ['CalonSiswa' => $calonSiswa]);
    }
}
