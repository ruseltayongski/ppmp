<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';
    protected $guarded = [];

    /**
     * Get the allotment that owns the budget.
     */
    public function allotment()
    {
        return $this->hasOne(BudgetAllotment::class,'FundSourceId');
    }
}
