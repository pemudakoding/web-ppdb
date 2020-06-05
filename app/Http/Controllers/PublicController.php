<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailWeb;
use App\Models\CalonSiswa;


use App\Helpers\WebHelper;

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

        return view('pages.public.register')->with([
            'month' => $month,
            'webInformation' => $webInformation
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_asli' => 'required|string',
            'nama_panggilan' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'bulan_lahir'   => 'required|string',
            'tahun_lahir'   => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama'     => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Khong Hu Cu',
            'kelurahan' => 'required|string',
            'kelurahan_lainnya' => 'nullable|string',
            'alamat' => 'required|string',
            'nisn'  => 'required|min:10|max:10',
            'nik'   => 'required|min:16|max:16',
            'no_kk' => 'required|min:16|max:16',
            'no_hp' => 'required|string',
            'sekolah_asal'   => 'required|string',
            'status_sekolah' => 'required|in:Negeri,Swasta',
            'nomor_btq' => 'nullable'
        ]);

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
}
