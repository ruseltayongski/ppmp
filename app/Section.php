<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $connection = 'dts';
    protected $table = 'section';

    public function programs() {
        return $this->hasMany('App\Program');
    }
}
