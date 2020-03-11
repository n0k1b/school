<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\notice;

use App\teacher;
use Session;
use App\Classes\SMSSender;
use App\Classes\SMSServiceException;
use App\school_list;
use App\school_user;
use App\student_list;
class NoticeController extends Controller
{
    //
 
    public function delete_notice(Request $request)

    {
    	$id = $request->id;
      notice::where('id',$id)->delete();
    }
  public function send_complain(Request $request)
  {
      $school_id= Session::get('school_id');
      $id = $request->id;
      $notice = $request->notice;
      $student = student_list::where('id','=',$id)->first();
      $contact_no = $student->contact_no;
      $user = school_user::where('mobile_number','=',$contact_no)->first();
      if($user)
      {
          $mask = $user->mask;
          	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
    	 $sender->setencoding('8');
    	$sender->sms($notice,$mask);
          
      }
      
  }
   public function update_notice(Request $request)
   {
      
       $id = $request->id;
        $notices = notice::find($id);
        $notices->notice_title = $request->notice_title;
        $notices->notice = $request->notice;
       
        $notices->save();

   }
   
   public function show_notice_modal(Request $request)

   {
   	$id = $request->id;
   	$notices = notice::where('id','=',$id)->first();
   	return json_encode($notices);
   }

    public function add_notice_class_interface()

    {
    	$school_id= Session::get('school_id');;

      $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
       return view ('dashboard.add_notice_class',['class_sections'=>$class_sections]); 
    }


      public function add_notice_all_interface()

    {
    	
       return view ('dashboard.add_notice_all'); 
    }
    
    public function add_notice_interface_teacher()

    {
     $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      $teacher_email = $teacher->email;
      
      $class_sections = teacher::where('email','=',$teacher_email)->where('school_id','=',$school_id)->distinct()->get(['class']);
       
      return view ('teacher.add_notice',['class_sections'=>$class_sections]);
    }

       public function view_notice_all_interface()

    {
    	
    	$school_id= Session::get('school_id');;
    	$notices = notice::where('school_id','=',$school_id)->where('class','=','all')->get();
    	//file_put_contents('test.txt', $notices);
       return view ('dashboard.view_notice_all',['notices'=>$notices]); 
    }

   
     public function view_notice_class_interface()

    {
       $school_id= Session::get('school_id');; 
       $class_sections = class_section::where('school_id','=',$school_id)->get();
        return view ('dashboard.view_notice_class',['class_sections'=>$class_sections]);

    }
    
    
     public function view_notice_interface_teacher()

    {
       $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
       //$class_sections = class_section::where('school_id','=',$school_id)->get();
        $teacher_email = $teacher->email;
      
      $class_sections = teacher::where('email','=',$teacher_email)->where('school_id','=',$school_id)->distinct()->get(['class']);
        return view ('teacher.view_notice_interface_teacher',['class_sections'=>$class_sections]);

    }

    
    public function show_notice_list(Request $request)

    {
    $school_id= Session::get('school_id');;
    $class = $request->class;
    $section = $request->section;
    $notices = notice::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->get();
  // file_put_contents('test.txt', $notices);
    $data="";


      foreach($notices as $notice)


      {

      	$data.=' <li>
             
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> '.$notice->date.'</span>

                <h3 class="timeline-header" style="color:blue;">'.$notice->notice_title.'</h3>

                <div class="timeline-body">
                  
                  '.$notice->notice.'

                </div>
                <div class="timeline-footer">
                  <button class="btn btn-primary btn-xs" onclick="GetUserDetails('.$notice->id.')">Edit</button>
                  <button class="btn btn-danger btn-xs" onclick="delete_data('.$notice->id.')">Delete</button>
                </div>
              </div>
            </li>
                ';

      }

      return $data;
    
    }


      public function show_notice_list_teacher(Request $request)

    {
   $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      
    $class = $request->class;
    $section = $request->section;
    $notices = notice::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->get();
  // file_put_contents('test.txt', $notices);
    $data="";


      foreach($notices as $notice)


      {

      	$data.=' <li>
             
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> '.$notice->date.'</span>

                <h3 class="timeline-header" style="color:blue;">'.$notice->notice_title.'</h3>

                <div class="timeline-body">
                  
                  '.$notice->notice.'

                </div>
                <div class="timeline-footer">
                  <button class="btn btn-primary btn-xs" onclick="GetUserDetails('.$notice->id.')">Edit</button>
                  <button class="btn btn-danger btn-xs" onclick="delete_data('.$notice->id.')">Delete</button>
                </div>
              </div>
            </li>
                ';

      }

      return $data;
    
    }

    public function submit_notice_class(Request $request)
    {
       
       $school_id= Session::get('school_id');;
       $class = $request->class;
       $section = $request->section;
       $notice = $request->notice;
       $notice_title = $request->notice_title;

        date_default_timezone_set('Asia/Dhaka');
     $date = date('d-m-Y');
     
    	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
       
       $notice = "Notice for class ".$class."\n".$notice;
       
       //file_put_contents("test3.txt",$notice);
       $notice_title = $request->notice_title;
       $sender->setencoding('8');
     $sender->broadcast($notice);

      $notices = new notice();
      $notices->class = $class;
      $notices->section = $section;
      $notices->notice_title =$notice_title;
      $notices->notice = $notice;
      $notices->school_id =$school_id;
      $notices->date = $date;
      $notices->save();
    }
    
    
    public function submit_notice_teacher(Request $request)
    {
       
      $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
       $class = $request->class;
       $section = $request->section;
        //$subject = $request->subject;
       $notice = $request->notice;
       
       $notice_title = $request->notice_title;

        date_default_timezone_set('Asia/Dhaka');
     $date = date('d-m-Y');
     
     	
    	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
       
       $notice = "Notice for class ".$class."\n".$notice;
       
       //file_put_contents("test3.txt",$notice);
       $notice_title = $request->notice_title;
       $sender->setencoding('8');
     $sender->broadcast($notice);

      $notices = new notice();
      $notices->class = $class;
      $notices->section = $section;
      $notices->notice_title =$notice_title;
      $notices->notice = $notice;
      $notices->school_id =$school_id;
      $notices->date = $date;
      $notices->save();
    }


     public function submit_notice_all(Request $request)
    {
       
     
       $class = 'all';
       
       date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');
    	$school_id= Session::get('school_id');
    	
    	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	try{
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
    	}
    	catch(exception $e)
    	{
    	    
    	}
       
       $notice = $request->notice;
       file_put_contents("notice.txt",$notice);
       $notice_title = $request->notice_title;
       
       try{
           $sender->setencoding('8');
           $sender->broadcast($notice);
       }
       catch(exception $e)
       {
           
       }
       

       

      $notices = new notice();
      $notices->class = $class;
      $notices->notice_title =$notice_title;
      $notices->notice = $notice;
      $notices->school_id =$school_id;
      $notices->date = $date;

      $notices->save();
    }
}
