<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $connection ='mysql';
    protected $table = 'budget';
    protected $guarded = [];

    /**
     * Get the allotment that owns the budget.
     */
    public function allotment()
    {
        //.return $this->belongsTo(BudgetAllotment::class);
        return $this->belongsTo(BudgetAllotment::class, 'fundSource_id', 'FundSourceId');
    }
}
