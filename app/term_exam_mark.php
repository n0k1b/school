<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class term_exam_mark extends Model
{
    //

      protected $fillable = ['school_id', 'class','section','subject', 'rollno','exam_type','full_marks','obtaining_marks_subjective','obtaining_marks_ct','obtaining_marks_objective','total_marks'];
}
