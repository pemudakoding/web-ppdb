<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\WebHelper;
use App\Models\CalonSiswa;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ppdb');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $webInformation = WebHelper::public();

        $peserta = new CalonSiswa();

        if ($request->has('status')) {
            $peserta = $peserta->where('status', $request->query('status'));
        }


        $peserta = $peserta->orderBy('nomor_pendaftaran')->paginate(10);

        return view('pages.admin.dashboard.peserta_didik.index')->with([
            'peserta' => $peserta,
            'webInformation' => $webInformation
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomor_pendaftaran)
    {
        $data = CalonSiswa::where('nomor_pendaftaran', $nomor_pendaftaran)->firstOrFail();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function setStatus(Request $request, $nomor_pendaftaran)
    {
        $request->validate([
            'set_status' => 'required|in:terima,tolak'
        ]);

        $data = CalonSiswa::where('nomor_pendaftaran', $nomor_pendaftaran)->firstOrFail();

        if ($request->set_status == 'terima') {
            $data->status = 'Diterima';
        } else {
            $data->status = 'Ditolak';
        }

        if ($data->save()) {
            return redirect()->back()->with([
                'alert' => [
                    'type'    => 'success',
                    'message' => "Sukses mengubah status <b>$data->nama_asli</b>"
                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CalonSiswa::findOrFail($id);

        if ($data->delete()) {
            return redirect()->back()->with([
                'alert' => [
                    'type'    => 'success',
                    'message' => "Sukses menghapus data <b>$data->nama_asli</b>"
                ]
            ]);
        }
    }
}
