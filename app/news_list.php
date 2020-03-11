<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_list extends Model
{
    //
    protected $fillable = ['school_id', 'title','news','image','date'];
}
