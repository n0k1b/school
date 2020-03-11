<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class income extends Model
{
     protected $fillable = ['income_name', 'income_amount','comment','income_date','school_id'];
     
}
