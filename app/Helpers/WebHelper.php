<?php

namespace App\Helpers;

use App\Models\DetailWeb;
use App\Models\CalonSiswa;
use phpDocumentor\Reflection\Types\Null_;

class WebHelper
{
    public static function public()
    {
        return DetailWeb::first();
    }

    public static function getRegisterNumber()
    {
        $data = CalonSiswa::select('nomor_pendaftaran')->latest()->first();
        $character = 'PSB-';
        if ($data == NULL) {
            $number = str_pad('1', '4', '0', STR_PAD_LEFT);
            return $character . $number;
        } else {
            $nomor_pendaftaran = explode('-', $data->nomor_pendaftaran)[1];
            $number = str_pad($nomor_pendaftaran + 1, '4', '0', STR_PAD_LEFT);
            return $character . $number;
        }
    }
}
