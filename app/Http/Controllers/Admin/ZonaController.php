<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\WebHelper;
use App\Http\Controllers\Controller;
use App\Models\ZonaSekolah;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zona = ZonaSekolah::paginate('10');
        return view('pages.admin.zona.index')->with([
            'webInformation' => WebHelper::public(),
            'zona' => $zona
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.zona.create')->with([
            'webInformation' => WebHelper::public()
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
        $data = $request->validate([
            'nama_zona' => 'required'
        ]);

        if (ZonaSekolah::create($data)) {
            return redirect()->route('zona.index')->with([
                'alert' => [
                    'type' => 'success',
                    'message' => 'Sukses menambhakan wilayah ' . $request->nama_zona
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
        $data = ZonaSekolah::findOrFail($id);

        if ($data->delete()) {
            return redirect()->route('zona.index')->with([
                'alert' => [
                    'type' => 'success',
                    'message' => 'Sukses menghapus wilayah ' . $data->nama_zona
                ]
            ]);
        }
    }
}
