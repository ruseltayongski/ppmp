<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetAllotment extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'FundSource';
}
