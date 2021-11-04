<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    public function section() {
        return $this->belongsTo('App\Section','section_id');
    }
}
