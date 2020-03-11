<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school_list extends Model
{
    //

     protected $fillable = ['school_name', 'school_email', 'school_address','school_thana','school_district','school_post_code','school_password','school_contact_no','remember_token'];

      protected $hidden = [
        'school_password', 'remember_token'
    ];
}
