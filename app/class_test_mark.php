<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_test_mark extends Model
{
     protected $fillable = ['school_id', 'class','section','subject', 'student_roll','class_test_name','full_marks','obtaining_marks','class_test_date'];
}
