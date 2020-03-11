<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
      protected $fillable = ['roll','fees_name','paid_amount','month','date','class', 'section','school_id'];
}
