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
        $totalRegister  = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->count();
        $totalDiterima  = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->where('status', 'Diterima')->count();
        $totalMale    = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->where('jenis_kelamin', 'Laki-Laki')->count();
        $totalFemale  = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->where('jenis_kelamin', 'Perempuan')->count();

        $totalPendaftarWilayah = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->groupBy('kelurahan')->selectRaw('count(kelurahan) as total, kelurahan')
            ->orderBy('total', 'desc')->get();



        return view('pages.admin.dashboard.index')->with([
            'totalDiterima' => $totalDiterima,
            'totalRegister' => $totalRegister,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalPendaftarWilayah' => $totalPendaftarWilayah,
            'webInformation' => $webInformation
        ]);
    }
}
