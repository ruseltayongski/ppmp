<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDaily extends Model
{
    protected $table = 'item_daily';
    protected $guarded = [];

    public function dts_user(){

        return $this->belongsTo('App\DtsUser','userid');
    }
}
