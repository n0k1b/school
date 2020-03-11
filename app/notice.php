<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    //
     protected $fillable = ['school_id', 'class', 'section','notice','date','notice_title'];
}
