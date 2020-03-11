<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher_attendance extends Model
{
    //

     protected $fillable = ['teacher_id','school_id','attendance_date','present','status'];
}
