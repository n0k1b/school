<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
     protected $fillable = ['class', 'section','school_id','rollno','attendance_date','present','status'];
     
}
