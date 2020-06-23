<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CalonSiswa;
use App\Helpers\WebHelper;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $webInformation = WebHelper::public();

        $totalRegister       = CalonSiswa::count();
        $totalDiterima       = CalonSiswa::where('status', 'Diterima')->count();
        $totalMale           = CalonSiswa::where('jenis_kelamin', 'Laki-Laki')->count();
        $totalFemale         = CalonSiswa::where('jenis_kelamin', 'Perempuan')->count();
        $totalPendaftarAgama = CalonSiswa::groupBy('agama')->selectRaw('count(agama) as total, agama')
            ->get();
        $totalPendaftarWilayah = CalonSiswa::groupBy('kelurahan')->selectRaw('count(kelurahan) as total, kelurahan')
            ->get();



        return view('pages.admin.dashboard.index')->with([
            'totalDiterima' => $totalDiterima,
            'totalRegister' => $totalRegister,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalPendaftarWilayah' => $totalPendaftarWilayah,
            'totalPendaftarAgama' => $totalPendaftarAgama,
            'webInformation' => $webInformation
        ]);
    }
}
