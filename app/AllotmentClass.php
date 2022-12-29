<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllotmentClass extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AllotmentClass';
}
