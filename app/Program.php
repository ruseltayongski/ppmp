<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    public function section() {
        return $this->belongsTo('App\Section','section_id');
    }

    public function nep_alloc()
    {
        //.return $this->belongsTo(BudgetAllotment::class);
        return $this->hasMany(NepAllocation::class, 'id', 'program_id');
    }
}
