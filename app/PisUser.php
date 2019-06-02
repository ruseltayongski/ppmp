<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PisUser extends Model
{
    protected $connection = 'pis';
    protected $table = 'personal_information';
}
