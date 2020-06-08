<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\WebHelper;

class DetailWeb extends Model
{

    protected $connection = 'mysqlTwo';

    public function getLogoAttribute($value)
    {
        return WebHelper::$cmsUrl . 'storage/' . $value;
    }

    public function getFaviconAttribute($value)
    {
        return WebHelper::$cmsUrl . 'storage/' . $value;
    }
}
