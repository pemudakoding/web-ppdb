<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailWeb;

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
    }
}
