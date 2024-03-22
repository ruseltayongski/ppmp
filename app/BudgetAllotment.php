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
    public function budgets()
    {
        //return $this->hasMany(Budget::class, 'fundSource_id');
        return $this->hasMany(Budget::class, 'fundSource_id', 'FundSourceId');
    }
}
