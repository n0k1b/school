<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_list;
use App\class_section;
use App\teacher;
use App\accountant;
use App\teacher_attendance;
use Session;

class TeacherController extends Controller
{
    //
    
    public function view_teacher_interface()
    
    {
        $school_id= Session::get('school_id');
         
         $teachers = teacher::where('school_id','=',$school_id)->get();
        
         return view ('dashboard.view_teacher',['teachers'=>$teachers]); 
         
         
        
        
    }
    
     public function view_accountant_interface()
    
    {
        $school_id= Session::get('school_id');
         
         $accountant = accountant::where('school_id','=',$school_id)->get();
        
         return view ('dashboard.view_accountant',['accountants'=>$accountant]); 
         
         
        
        
    }
    
    
    
     public function delete_teacher_data(Request $request)
    {
      $id = $request->id;
      teacher::where('id',$id)->delete();
    }
    
     public function delete_accountant_data(Request $request)
    {
      $id = $request->id;
      accountant::where('id',$id)->delete();
    }
    
    
    public function update_teacher_data(Request $request)
    
    
    { 
        
        $id = $request->id;
        $teacher=teacher::find($id);
       
        $teacher->class = $request->class;
        $teacher->section = $request->section;
        $teacher->subject = $request->subject;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;
        $teacher->save();
        



    }
    
    
     public function update_accountant_data(Request $request)
    
    
    { 
        
        $id = $request->id;
        $accountant=accountant::find($id);
       
      
        $accountant->name = $request->name;
        $accountant->email = $request->email;
        $accountant->password = $request->password;
        $accountant->save();
        



    }
    
    
     public function show_update_modal_teacher(Request $request)
    {
        $id = $request->id;
        $teacher = teacher::where('id', '=', $id)->first();
        return json_encode($teacher);
        file_put_contents('test.txt',$teacher);


    }
    
    
     public function show_update_modal_accountant(Request $request)
    {
        $id = $request->id;
        $accountant = accountant::where('id', '=', $id)->first();
        return json_encode($accountant);
        //file_put_contents('test.txt',$teacher);


    }
    
    public function add_teacher_interface()
    {


       $school_id= Session::get('school_id');

      $class_sections = class_section::where('school_id','=',$school_id)->get();
       return view ('dashboard.add_teacher',['class_sections'=>$class_sections]); 
    }
    
    
    public function add_accountant_interface()
    {


       $school_id= Session::get('school_id');

    
       return view ('dashboard.add_accountant'); 
    }
    
    

    public function getTeachersForm(Request $request)
    {
    	$class = $request->class;
    	$section - $request->section;


    }
    
    public function show_teacher_login()
    {   
        
        if(Session::has('teacher_id'))
        {
            return view('teacher.main_page');
        }
        else
        {
         return view ('teacher.index'); 
        }
         
    }
    public function login(Request $request)
    {
        $teacher = teacher::where('email','=',$request->email)->where('password','=',$request->password)->first();

        if($teacher===null)
        {
         Session::flash ( 'message', "Invalid Email or Password" );
                return redirect('teacher'); 
        }
        else
        {  
            
             Session::put('teacher_id', $teacher->id);
        	return view('teacher.main_page');
        }
    }
    
    
    
    public function account_login(Request $request)
    {
        $accountant = accountant::where('email','=',$request->email)->where('password','=',$request->password)->first();

        if($accountant===null)
        {
         Session::flash ( 'message', "Invalid Email or Password" );
                return redirect('account'); 
        }
        else
        {  
            
             Session::put('school_id', $accountant->school_id);
        	return view('account.main_page');
        }
    }
    
    
    
    public function add_teacher(Request $request)
    {
        $school_id= Session::get('school_id');
      $name = $request->name;
      $name = explode(',', $name);
      
      $email = $request->email;
      $email = explode(',', $email);
      
      $password = $request->password;
      $password = explode(',', $password);
      
      $subject = $request->subject;
      $subject = explode(',', $subject);
      
      $class_name = $request->class_name;
      $section = $request->section;
      
      for($i=0;$i<sizeof($name);$i++)
      {
          
          teacher :: create(['school_id'=>$school_id,'name'=>$name[$i],'email'=>$email[$i],'password'=>$password[$i],'subject'=>$subject[$i],'class'=>$class_name,'section'=>$section]);
          
       }
      
      
      
    }
    
    
     public function add_accountant(Request $request)
    {
        $school_id= Session::get('school_id');
      $name = $request->name;
      $name = explode(',', $name);
      
      $email = $request->email;
      $email = explode(',', $email);
      
      $password = $request->password;
      $password = explode(',', $password);
      
    
      
      for($i=0;$i<sizeof($name);$i++)
      {
          
          accountant :: create(['school_id'=>$school_id,'name'=>$name[$i],'email'=>$email[$i],'password'=>$password[$i]]);
          
       }
      
      
      
    }


     public function add_teacher_attendance(Request $request)

    {
        $school_id= Session::get('school_id');;
      
      $attendance_date = $request->attendance_date;
        
        $status = teacher_attendance::where('school_id','=',$school_id)->where('attendance_date','=',$attendance_date)->where('status','=',1)->get();

          //file_put_contents('test.txt',$class." ".$section." ".$attendance_date);

        if($status->isEmpty())

        {

             $teacher = teacher::where('school_id','=',$school_id)->distinct()->get(['name']);
    

      //file_put_contents('test.txt', $class." ".$section);

    $data="";

        for($i=0;$i<sizeof($teacher);$i++)

        {

            $name = $teacher[$i]->name;
            
         
                   
            $id = teacher::where('school_id','=',$school_id)->where('name','=',$name)->first()->id;

            
           

             
            $data .= '<tr>
     
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


    public function teacher_present_check(Request $request)

    {
        date_default_timezone_set('Asia/Dhaka');
  $date = date('d-m-Y');
      $school_id= Session::get('school_id');
      
     
      $teacher_id = $request->id;  //teacher_id;
       
      $attendance_date = $request->attendance_date;

      $status = teacher_attendance::where('teacher_id','=',$teacher_id)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

      if($status->isEmpty())
      {
        $attendance = new teacher_attendance();
        
        $attendance->school_id = $school_id;
        $attendance->attendance_date = $attendance_date;
        $attendance->present = 1;
        $attendance->teacher_id = $teacher_id;
        $attendance->save();
         
      }

      else{
            
            teacher_attendance::where('teacher_id','=',$teacher_id)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>1));
      }
      
   

    }


    public function teacher_absent_check(Request $request)

    {
      $school_id= Session::get('school_id');;
      
      
      
 

      $teacher_id = $request->id;  //stduent_id;
       
      
      $attendance_date = $request->attendance_date;

      $status = teacher_attendance::where('teacher_id','=',$teacher_id)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->get();

      if($status->isEmpty())
      {
        $attendance = new teacher_attendance();
       
        $attendance->school_id = $school_id;
        $attendance->attendance_date = $attendance_date;
        $attendance->present = 0;
        $attendance->teacher_id = $teacher_id;
        $attendance->save();

      }

      else{
            
            teacher_attendance::where('teacher_id','=',$teacher_id)->where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('present'=>0));

      }
      
      
    }


    public function submit_teacher_attendance(Request $request)

    {
      $school_id= Session::get('school_id');;
    
      $attendance_date = $request->attendance_date;

      teacher_attendance::where('attendance_date','=',$attendance_date)->where('school_id','=',$school_id)->update(array('status'=>1));
    }
    
    
}
