<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject_list extends Model
{
    //

     protected $fillable = ['subject_name', 'class_name', 'school_id','marks'];
}
