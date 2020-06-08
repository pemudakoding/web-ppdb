<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;

use App\Helpers\WebHelper;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $connection = 'mysqlTwo';

    public function Role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    public function getPhotoAttribute($value)
    {
        if (!empty($value)) {
            return WebHelper::$cmsUrl . 'storage/' . $value;
        } else {
            return WebHelper::$cmsUrl . 'storage/assets/img/profile/default.jpg';
        }
    }
}
