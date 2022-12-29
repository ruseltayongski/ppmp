<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetAllotment extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'FundSource';

    /**
     * Get the budget for the budget allotment.
     */
    public function budget()
    {
        return $this->belongsTo(Budget::class,"fundSource_id");
    }
}
