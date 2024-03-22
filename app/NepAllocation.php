<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NepAllocation extends Model
{
    protected $table = 'nep_allocation';
    protected $guarded = [];

    public function nep()
    {
        //.return $this->belongsTo(BudgetAllotment::class);
        return $this->belongsTo(Nep::class);
    }

    public function getKeyName()
    {
        return 'nep_id';
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
