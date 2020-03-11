<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
class EmailController extends Controller
{
    public function sendEmail()
    {
       
       


       $data = array( 'email' => "nokibevon7@gmail.com", 'first_name' =>"Hello", 'from' => 'robi3443@gmail.com', 'from_name' => $school_name );

        Mail::send(['text'=>'mail'], ['name','Nokib'], function($message) use ($data) {
 
           $message->to( $data['email'] )->from( $data['from'], $data['first_name'] )->subject( 'Confirmation Mail' );
      }
    }
}