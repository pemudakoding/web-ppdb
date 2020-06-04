<?php

namespace App\Helpers;

use App\Models\DetailWeb;

class WebHelper
{
    public static function public()
    {
        return DetailWeb::first();
    }
}
