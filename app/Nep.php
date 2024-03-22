<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nep extends Model
{
    protected $table = 'nep';
    protected $guarded = [];

    public function allocate()
    {
        //return $this->hasMany(Budget::class, 'fundSource_id');
        return $this->hasMany(NepAllocation::class, 'id', 'nep_id');
    }
}

