<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realignment extends Model
{
    protected $fillable = [
        'id','expense_from','expense_to','amount','userid','division_id','section_id','status'
    ];
}
