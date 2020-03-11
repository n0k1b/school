<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\admin_message;
use Hash;
use Session;
use App\student_list;

class adminController extends Controller
{
    //
    public function show_admin_login()

    {
    	return view('admin.index');
    }

    public function save_admin()
    
    {
    	$email ="abc@gmail.com";
    	$password = Hash::make("1234");
    	admin::create(['email'=>$email,'password'=>$password]);

    }
    public function view_message()
    {
        $messages = admin_message::all();
        return view('admin.view_message',['messages'=>$messages]);
    }

    public function read_message($id)
    {
        //file_put_contents('test.txt',$id);

        $messages = admin_message::where('id','=',$id)->first();
       // file_put_contents('test.txt', $messages);
        return view('admin.read_message',['messages'=>$messages]);
    }
      
    public function login(Request $request)
    {
        $admin = admin::where('email','=',$request->email)->where('password','=',$request->password)->first();

        if($admin===null)
        {
         Session::flash ( 'message', "Invalid Email or Password" );
                return redirect('admin'); 
        }
        else
        {
        	return view('admin.main_page');
        }
    }
    
    public function view_all_student_interface()
      {
          $school_id = 3;
          $students = student_list::where('school_id','=',$school_id)->orderBy('class', 'ASC')->get();
           return view('admin.view_all_student',['students'=>$students]);
      }
    

}
