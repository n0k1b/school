<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    //
    protected $fillable = ['school_id','name','email','password','class','subject','section'];
}

