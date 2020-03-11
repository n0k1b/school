<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\attendance;

use App\attendance_out;
use App\student_list;
use App\teacher;
use Session;
use App\Classes\SMSSender;
use App\Classes\SMSServiceException;
use App\school_user;
use App\school_list;
use App\Classes\Subscription;
use App\Classes\SubscriptionException;
use App\teacher_attendance;

class AttendanceController extends Controller
{
    
  
    
    public function view_attendance(Request $request)

    {

        $school_id= Session::get('school_id');
    	$class = $request->class;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$att = attendance::where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->orderBy('rollno', 'ASC')->get();
    

    	$data = "";
         
         for($i=0;$i<sizeof($att);$i++)
         {

         	$student = student_list::where('section','=',$section)->where('class','=',$class)->where('roll_no','=',$att[$i]->rollno)->first();

           
    	if($att[$i]->present == 1)
			{
				$attendance = "<p style ='color:green'>PRESENT</p>";
			}
			else
			{
				$attendance = "<p style ='color:red'>ABSENT</p>";
			}
			$data .= '<tr>
                        <td>'.$att[$i]->rollno.'</td>
                     <td>'.$student->name.'</td>
                   
                     <td >'.$attendance.'</td>

 
	           		</tr>';
			

		}
		
		return $data;
	

    }
    
   public function check_teacher_attendance(Request $request)
   {
       $school_id = Session::get('school_id');
       $attendance_date = $request->attendance_date;
       
        $att = teacher_attendance::where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();
      
               
    	$data = "";
    	
        if($att->isEmpty())
        {
            $data = "No data available";
        }
        else
         {
         for($i=0;$i<sizeof($att);$i++)
         {

         	$teacher = teacher::where('id','=',$att[$i]->teacher_id)->first();
            
           
    	if($att[$i]->present == 1)
			{
				$attendance = "<p style ='color:green'>PRESENT</p>";
			}
			else
			{
				$attendance = "<p style ='color:red'>ABSENT</p>";
			}
			$data .= '<tr>
                      
                     <td>'.$teacher->name.'</td>
                   
                     <td >'.$attendance.'</td>

 
	           		</tr>';
			

		}
         }
		
		return $data;
       
   }
    
    
    
     public function view_attendance_teacher(Request $request)

    {

        $school_id = $request->school_id;
    	$class = $request->class;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$att = attendance::where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->orderBy('rollno', 'ASC')->get();
      
               
    	$data = "";
    	
        if($att->isEmpty())
        {
            $data = "No data available";
        }
        else
         {
         for($i=0;$i<sizeof($att);$i++)
         {

         	$student = student_list::where('section','=',$section)->where('class','=',$class)->where('roll_no','=',$att[$i]->rollno)->first();
            
           
    	if($att[$i]->present == 1)
			{
				$attendance = "<p style ='color:green'>PRESENT</p>";
			}
			else
			{
				$attendance = "<p style ='color:red'>ABSENT</p>";
			}
			$data .= '<tr>
                        <td>'.$att[$i]->rollno.'</td>
                     <td>'.$student->name.'</td>
                   
                     <td >'.$attendance.'</td>

 
	           		</tr>';
			

		}
         }
		
		return $data;
	

    }

     public function view_attendance_teacher_out(Request $request)

    {

       $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
    	$class = $request->class;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$att = attendance_out::where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->orderBy('rollno', 'ASC')->get();
      
               
    	$data = "";
    	
        if($att->isEmpty())
        {
            $data = "No data available";
        }
        else
         {
         for($i=0;$i<sizeof($att);$i++)
         {

         	$student = student_list::where('section','=',$section)->where('class','=',$class)->where('roll_no','=',$att[$i]->rollno)->first();
            
           
    	if($att[$i]->present == 1)
			{
				$attendance = "<p style ='color:green'>PRESENT</p>";
			}
			else
			{
				$attendance = "<p style ='color:red'>ABSENT</p>";
			}
			$data .= '<tr>
                        <td>'.$att[$i]->rollno.'</td>
                     <td>'.$student->name.'</td>
                   
                     <td >'.$attendance.'</td>

 
	           		</tr>';
			

		}
         }
		
		return $data;
	

    }




     public function view_add_attendance_interface()
    {
      $school_id= Session::get('school_id');

      $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
       return view ('dashboard.add_attendance',['class_sections'=>$class_sections]); 

    }
    
    public function view_add_attendance_interface_teacher()
    {
      $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      $teacher_email = $teacher->email;
      
      $class_sections = teacher::where('email','=',$teacher_email)->where('school_id','=',$school_id)->distinct()->get(['class']);
      //$class_sections = class_section::where('school_id','=',$school_id)->get();
      // $teacher = teacher::where('id','=',$teacher_id)->first();
       
       //return view ('teacher.add_attendance',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
  return view ('teacher.add_attendance',['class_sections'=>$class_sections]);
    }
    
    
     public function view_add_attendance_interface_teacher_out()
    {
    //   $teacher_id= Session::get('teacher_id');
      
      
    //   $teacher = teacher::where('id','=',$teacher_id)->first();
       
    //   return view ('teacher.add_attendance_out',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
    
     $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      $teacher_email = $teacher->email;
      
      $class_sections = teacher::where('email','=',$teacher_email)->where('school_id','=',$school_id)->distinct()->get(['class']);
      //$class_sections = class_section::where('school_id','=',$school_id)->get();
      // $teacher = teacher::where('id','=',$teacher_id)->first();
       
       //return view ('teacher.add_attendance',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
  return view ('teacher.add_attendance_out',['class_sections'=>$class_sections]);

    }


     public function view_attendance_interface()
    {
      $school_id= Session::get('school_id');;

      $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
       return view ('dashboard.view_attendance_interface',['class_sections'=>$class_sections]); 

    }
    
     public function view_attendance_interface_teacher()
    {
    //   $teacher_id= Session::get('teacher_id');
      
      
    //   $teacher = teacher::where('id','=',$teacher_id)->first();
       
    //   return view ('teacher.view_attendance_interface',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
    
    $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      $teacher_email = $teacher->email;
      
      $class_sections = teacher::where('email','=',$teacher_email)->where('school_id','=',$school_id)->distinct()->get(['class']);
      //$class_sections = class_section::where('school_id','=',$school_id)->get();
      // $teacher = teacher::where('id','=',$teacher_id)->first();
       
       //return view ('teacher.add_attendance',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
  return view ('teacher.view_attendance_interface',['class_sections'=>$class_sections]);

    }
    
    
     public function view_attendance_interface_teacher_out()
    {
    //   $teacher_id= Session::get('teacher_id');
      
      
    //   $teacher = teacher::where('id','=',$teacher_id)->first();
       
    //   return view ('teacher.view_attendance_interface_out',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
    
     $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      $teacher_email = $teacher->email;
      
      $class_sections = teacher::where('email','=',$teacher_email)->where('school_id','=',$school_id)->distinct()->get(['class']);
      //$class_sections = class_section::where('school_id','=',$school_id)->get();
      // $teacher = teacher::where('id','=',$teacher_id)->first();
       
       //return view ('teacher.add_attendance',['school_id'=>$teacher->school_id,'class_name'=>$teacher->class,'section'=>$teacher->section]); 
  return view ('teacher.view_attendance_interface_out',['class_sections'=>$class_sections]);

    }



    public function present_check(Request $request)

    {
        date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');
    	$school_id= Session::get('school_id');
    	
    	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
          $msg1 = "Your Children is present at"." ".$date;
          $msg2 ="আপনার শিক্ষার্থী উপস্থিত ছিলো".$date;
          
          
    	$id = $request->id;  //stduent_id;
       
        $student = student_list::where('id','=',$id)->first();
        $roll = $student->roll_no;
        $mobile_number = $student->contact_no;
        
        $user = school_user::where('mobile_number','=',$mobile_number)->first();
        
        //file_put_contents('test.txt',$user);
        $mask = '';
        if($user)
        {
        $mask = $user->mask;
        
        }
        
        
        
        //file_put_contents('test.txt',$roll);
        
     	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$status = attendance::where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

    	if($status->isEmpty())
    	{
    		$attendance = new attendance();
    		$attendance->class=$class;
    		$attendance->section = $section;
    		$attendance->school_id = $school_id;
    		$attendance->attendance_date = $attendance_date;
    		$attendance->present = 1;
    		$attendance->rollno = $roll;
    		$attendance->save();
    		

    	}

    	else{
            
            attendance::where('rollno','=',$roll)->where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>1));

    	}
    	if($mask)
    	{
    	 $sender->setencoding('8');
    	 $sender->sms($msg1.$msg2,$mask);
    	 }

   

    }
    
    
     public function present_check_teacher(Request $request)

    {
    	 $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;

    	$id = $request->id;  //stduent_id;
       
        $student = student_list::where('id','=',$id)->first();
        $roll = $student->roll_no;
        
         
          
          
        //file_put_contents('test.txt',$roll);
        
     	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$status = attendance::where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

    	if($status->isEmpty())
    	{
    		$attendance = new attendance();
    		$attendance->class=$class;
    		$attendance->section = $section;
    		$attendance->school_id = $school_id;
    		$attendance->attendance_date = $attendance_date;
    		$attendance->present = 1;
    		$attendance->rollno = $roll;
    		$attendance->save();

    	}

    	else{
            
            attendance::where('rollno','=',$roll)->where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>1));

    	}
        date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');
    	
    	
    		$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
         // $msg = "Your Children is present at"." ".$date;
          $msg1 = "Your Children is present at"." ".$date;
          $msg2 ="আপনার শিক্ষার্থী উপস্থিত ছিলো".$date;
          
           $mobile_number = $student->contact_no;
        
        $user = school_user::where('mobile_number','=',$mobile_number)->first();
        
        $mask = $user->mask;
        if($mask)
        {
    $sender->setencoding('8');
        $sender->sms($msg1." ".$msg2,$mask);
        }
    }
    
    
         public function present_check_teacher_out(Request $request)

    {
        
        //file_put_contents('test.txt','hello');
         $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
    	//$school_id = $request->school_id;

    	$id = $request->id;  //stduent_id;
       
        $student = student_list::where('id','=',$id)->first();
        $roll = $student->roll_no;
        
         
          
          
        //file_put_contents('test.txt',$roll);
        
     	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$status = attendance_out::where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

    	if($status->isEmpty())
    	{
    		$attendance = new attendance_out();
    		$attendance->class=$class;
    		$attendance->section = $section;
    		$attendance->school_id = $school_id;
    		$attendance->attendance_date = $attendance_date;
    		$attendance->present = 1;
    		$attendance->rollno = $roll;
    		$attendance->save();

    	}

    	else{
            
            attendance_out::where('rollno','=',$roll)->where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>1));

    	}
        date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');
    	
    	
    		$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
          //$msg = "Your Children is present at out time"." ".$date;
          $msg1 = "Your Children is present in out-time at"." ".$date;
          $msg2 ="আপনার শিক্ষার্থী শেষ সময়ে উপস্থিত ছিলো".$date;
          $mobile_number = $student->contact_no;
          
        $user = school_user::where('mobile_number','=',$mobile_number)->first();
        
      
        if($user)
        {
         $mask = $user->mask;
         $sender->setencoding('8');
        $sender->sms($msg1." ".$msg2,$mask);
        }
    }
    
    

    public function absent_check(Request $request)

    {
    	$school_id= Session::get('school_id');;
    	
    		$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);

    	$id = $request->id;  //stduent_id;
       
        $student = student_list::where('id','=',$id)->first();
        $roll = $student->roll_no;
        //file_put_contents('test.txt',$roll);
        
     	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$status = attendance::where('rollno','=',$roll)->where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

    	if($status->isEmpty())
    	{
    		$attendance = new attendance();
    		$attendance->class=$class;
    		$attendance->section = $section;
    		$attendance->school_id = $school_id;
    		$attendance->attendance_date = $attendance_date;
    		$attendance->present = 0;
    		$attendance->rollno = $roll;
    		$attendance->save();

    	}

    	else{
            
            attendance::where('rollno','=',$roll)->where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>0));

    	}
    	
    	date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');
    	
    
          //$msg = "Your Children is absent at"." ".$date;
          
          $msg1 = "Your Children is absent at"." ".$date;
          $msg2 = "আপনার শিক্ষার্থী অনুপস্থিত ছিলো".$date;
          
          
           $mobile_number = $student->contact_no;
        
        $user = school_user::where('mobile_number','=',$mobile_number)->first();
        
        if($user)
        {
        $mask = $user->mask;
   $sender->setencoding('8');
        $sender->sms($msg1." ".$msg2,$mask);
        }

    }
    
    
     public function absent_check_teacher(Request $request)

    {
     $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;

    	$id = $request->id;  //stduent_id;
       
        $student = student_list::where('id','=',$id)->first();
        $roll = $student->roll_no;
        //file_put_contents('test.txt',$roll);
        
     	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$status = attendance::where('rollno','=',$roll)->where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

    	if($status->isEmpty())
    	{
    		$attendance = new attendance();
    		$attendance->class=$class;
    		$attendance->section = $section;
    		$attendance->school_id = $school_id;
    		$attendance->attendance_date = $attendance_date;
    		$attendance->present = 0;
    		$attendance->rollno = $roll;
    		$attendance->save();

    	}

    	else{
            
            attendance::where('rollno','=',$roll)->where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>0));

    	}
    	
    	date_default_timezone_set('Asia/Dhaka');
       $date = date('d-m-Y');
    
    	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
          $msg1 = "Your Children is absent at"." ".$date;
          $msg2 = "আপনার শিক্ষার্থী অনুপস্থিত ছিলো".$date;
          
           $mobile_number = $student->contact_no;
        
        $user = school_user::where('mobile_number','=',$mobile_number)->first();
        if($user)
        {
        $mask = $user->mask;
    $sender->setencoding('8');
        $sender->sms($msg1." ".$msg2,$mask);
        }

    }
    
    
       public function absent_check_teacher_out(Request $request)

    {
    // 	$school_id = $request->school_id;
    
     $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;

    	$id = $request->id;  //stduent_id;
       
        $student = student_list::where('id','=',$id)->first();
        $roll = $student->roll_no;
        //file_put_contents('test.txt',$roll);
        
     	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	$status = attendance_out::where('rollno','=',$roll)->where('section','=',$section)->where('rollno','=',$roll)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

    	if($status->isEmpty())
    	{
    		$attendance = new attendance_out();
    		$attendance->class=$class;
    		$attendance->section = $section;
    		$attendance->school_id = $school_id;
    		$attendance->attendance_date = $attendance_date;
    		$attendance->present = 0;
    		$attendance->rollno = $roll;
    		$attendance->save();

    	}

    	else{
            
            attendance_out::where('rollno','=',$roll)->where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>0));

    	}
    	
    	date_default_timezone_set('Asia/Dhaka');
       $date = date('d-m-Y');
    
    	$app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
         // $msg = "Your Children is absent at out time"." ".$date;
          $msg1 = "Your Children is absent in out-time at"." ".$date;
          $msg2 = "আপনার শিক্ষার্থী শেষ সময়ে অনুপস্থিত ছিলো".$date;
           $mobile_number = $student->contact_no;
        
        $user = school_user::where('mobile_number','=',$mobile_number)->first();
        
        if($user)
        {
        $mask = $user->mask;
         $sender->setencoding('8');
         
        $sender->sms($msg1." ".$msg2,$mask);
        }

    }


    public function submit_attendance(Request $request)

    {
    	$school_id= Session::get('school_id');;
    	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;
    	
    	file_put_contents('test.txt',$school_id." ".$class." ".$section." ".$attendance_date);

    	attendance::where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(['status'=>1]);
    }
    
    
     public function submit_attendance_teacher(Request $request)

    {
    	 $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
    	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	attendance::where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('status'=>1));
    }
    
    
    public function submit_attendance_teacher_out(Request $request)

    {
     $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
    	$class = $request->class_name;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;

    	attendance_out::where('section','=',$section)->where('class','=',$class)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('status'=>1));
    }




    public function add_attendance(Request $request)

    {
        $school_id= Session::get('school_id');;
    	$class = $request->class;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;
        
        $status = attendance::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->where('attendance_date','=',$attendance_date)->where('status','=',1)->get();

          //file_put_contents('test.txt',$class." ".$section." ".$attendance_date);

        if($status->isEmpty())

        {

             $student = student_list::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no', 'ASC')->get();

      //file_put_contents('test.txt', $class." ".$section);

    $data="";

        foreach($student as $student_list)

        {

            $name = $student_list->name;
            
            $roll = $student_list->roll_no;

            $id = $student_list->id;

            
           

             
            $data .= '<tr>
			<td>'.$roll.'</td>
			<td>'.$name.'</td>
			<td align="center" id ="present'.$id.'" ><button id="pre" type="button" class="btn btn-info btn-circle" onClick= "present_check('.$id.')" value = "'.$id.'" ><i class="glyphicon glyphicon-ok"></i></button></td>

			<td align="center" id ="absent'.$id.'"> <button type="button" class="btn btn-warning btn-circle" onClick= "absent_check('.$id.')" ><i class="glyphicon glyphicon-remove"></i></button></td>
			</tr>';
        }

          
        }


        else{

        	$data ="existing";
        }




    	
       return $data;


    }
    
      public function add_attendance_teacher_out(Request $request)

    {
      $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
    	$class = $request->class;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;
        
        $status = attendance_out::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->where('attendance_date','=',$attendance_date)->where('status','=',1)->get();

          //file_put_contents('test.txt',$class." ".$section." ".$attendance_date);

        if($status->isEmpty())

        {

             $student = student_list::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no', 'ASC')->get();

      //file_put_contents('test.txt', $class." ".$section);

    $data="";

        foreach($student as $student_list)

        {

            $name = $student_list->name;
            
            $roll = $student_list->roll_no;

            $id = $student_list->id;

            
           

             
            $data .= '<tr>
			<td>'.$roll.'</td>
			<td>'.$name.'</td>
			<td align="center" id ="present'.$id.'" ><button id="pre" type="button" class="btn btn-info btn-circle" onClick= "present_check('.$id.')" value = "'.$id.'" ><i class="glyphicon glyphicon-ok"></i></button></td>

			<td align="center" id ="absent'.$id.'"> <button type="button" class="btn btn-warning btn-circle" onClick= "absent_check('.$id.')" ><i class="glyphicon glyphicon-remove"></i></button></td>
			
			<td>Sub</td>
			</tr>
			
			
			
			';
        }

          
        }


        else{

        	$data ="existing";
        }




    	
       return $data;


    }
    
     public function add_attendance_teacher(Request $request)

    { 
        
        $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
      
    	$class = $request->class;
    	$section = $request->section;
    	$attendance_date = $request->attendance_date;
        
        $status = attendance::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->where('attendance_date','=',$attendance_date)->where('status','=',1)->get();

          //file_put_contents('test.txt',$class." ".$section." ".$attendance_date);

        if($status->isEmpty())

        {

             $student = student_list::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no', 'ASC')->get();

      //file_put_contents('test.txt', $class." ".$section);

    $data="";

        foreach($student as $student_list)

        {

            $name = $student_list->name;
            
            $roll = $student_list->roll_no;

            $id = $student_list->id;

            
           

             
            $data .= '<tr>
			<td>'.$roll.'</td>
			<td>'.$name.'</td>
			<td align="center" id ="present'.$id.'" ><button id="pre" type="button" class="btn btn-info btn-circle" onClick= "present_check('.$id.')" value = "'.$id.'" ><i class="glyphicon glyphicon-ok"></i></button></td>

			<td align="center" id ="absent'.$id.'"> <button type="button" class="btn btn-warning btn-circle" onClick= "absent_check('.$id.')" ><i class="glyphicon glyphicon-remove"></i></button></td>
			
			<td>Sub</td>
			</tr>
			
			
			
			';
        }

          
        }


        else{

        	$data ="existing";
        }




    	
       return $data;


    }

}
