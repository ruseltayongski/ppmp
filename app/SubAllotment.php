<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAllotment extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'SubAllotment';
}
