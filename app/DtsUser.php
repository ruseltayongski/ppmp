<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DtsUser extends Authenticatable
{
    protected $connection = 'dts';
    protected $table = 'users';

    public function item_daily()
    {
        return $this->hasMany('App\DtsUser');
    }
}
