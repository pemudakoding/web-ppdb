<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailWeb extends Model
{

    protected $connection = 'mysqlTwo';

    public function getLogoAttribute($value)
    {
        return 'https://smp15palu.sch.id/storage/' . $value;
    }

    public function getFaviconAttribute($value)
    {
        return 'https://smp15palu.sch.id/storage/' . $value;
    }
}
