<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
     protected $fillable = ['expense_name', 'expense_amount','comment','expense_date','school_id'];
     
}
