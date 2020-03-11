<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_record extends Model
{
    //
     protected $fillable = ['roll','total_amount','paid_amount','payment_status','payment_month','date','class', 'section','school_id'];
}
