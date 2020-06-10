<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailWeb;
use App\Models\CalonSiswa;
use App\Models\ZonaSekolah;

use App\Helpers\WebHelper;
use App\Http\Requests\RegisterRequest;

class PublicController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $webInformation = WebHelper::public();

        return view('pages.public.home')->with([
            'webInformation' => $webInformation
        ]);
    }

    public function create()
    {

        $month = [
            'January', 'Februari', 'Mei', 'Maret',
            'April', 'Mei', 'Juni', 'Juli',
            'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $webInformation = WebHelper::public();
        $zonaSekolah = ZonaSekolah::select('nama_zona')->get();

        if (date('d') != '17') {
            return view('pages.public.register')->with([
                'month' => $month,
                'webInformation' => $webInformation,
                'zonaSekolah' => $zonaSekolah
            ]);
        } else {
            return view('pages.public.comingSoon')->with([
                'webInformation' => $webInformation
            ]);
        }
    }

    public function store(RegisterRequest $request)
    {


        $data = $request->except(['tanggal_lahir', 'bulan_lahir', 'tahun_lahir', 'kelurahan', 'kelurahan_lainnya']);
        $data['tanggal_lahir']     = $request->tanggal_lahir . '-' . $request->bulan_lahir . '-' . $request->tahun_lahir;
        $data['nomor_pendaftaran'] = WebHelper::getRegisterNumber();

        if ($request->has('kelurahan_lainnya'))
            $data['kelurahan'] = $request->kelurahan_lainnya;
        else
            $data['kelurahan'] = $request->kelurahan;

        if (CalonSiswa::create($data)) {
            return redirect()->route('register')->with([
                'psb' => 'success',
                'nomor_pendaftaran' => $data['nomor_pendaftaran'],
                'nama_pendaftar' => $request->nama_asli
            ]);
        } else {
            return redirect()->route('register')->with([
                'psb' => 'error',
                'nama_pendaftar' => $request->nama_asli
            ]);
        }
    }

    public function cetakPsb($no_pendaftaran)
    {

        $dataPendaftar = CalonSiswa::where('nomor_pendaftaran', $no_pendaftaran)->firstOrFail();
        $webInformation = WebHelper::public();

        return view('pages.public.suratPsb')->with([
            'dataPendaftar' => $dataPendaftar,
            'webInformation' => $webInformation
        ]);
    }

    public function checkRegister()
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
        $totalPendaftarAgama = CalonSiswa::whereIn('kelurahan', function ($query) {
            $query->select('nama_zona')
                ->from('zona_sekolahs');
        })->groupBy('agama')->selectRaw('count(agama) as total, agama')
            ->orderBy('total', 'desc')->get();


        return view('pages.public.checkRegister')->with([
            'webInformation' => $webInformation,
            'totalDiterima' => $totalDiterima,
            'totalRegister' => $totalRegister,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalPendaftarWilayah' => $totalPendaftarWilayah,

        ]);
    }

    public function getRegisterData(Request $request)
    {

        $data = CalonSiswa::select('nomor_pendaftaran', 'nama_asli', 'status')->where('nomor_pendaftaran', $request->nomor_pendaftaran)->first();
        if ($data != NULL) {
            return redirect()->route('register.info')->with([
                'data_pendaftar' => $data,
                'status' => 'success',
            ]);
        } else {
            return redirect()->route('register.info')->with([
                'nomor_pendaftaran' => strip_tags($request->nomor_pendaftaran),
                'status' => 'fail',
            ]);
        }
    }
}
