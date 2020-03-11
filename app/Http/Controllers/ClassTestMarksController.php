<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\student_list;
use App\class_test_mark;
use App\subject_list;
use Session;

class ClassTestMarksController extends Controller
{
    //
    public function add_class_test_marks_interface()
    {
    	$school_id= Session::get('school_id');;

    	$class_sections = class_section::where('school_id','=',$school_id)->get();



    	// $subjects = subject_list::where('school_id','=',$school_id)->get();

    	return view('dashboard.add_class_test_marks',['class_sections'=>$class_sections]);


    }


 public function delete_class_test_marks(Request $request)
    {
      $id = $request->id;
      class_test_mark::where('id',$id)->delete();
    }
     


public function show_class_test_marks_modal(Request $request)
    {
        $id = $request->id;
        $student = class_test_mark::where('id', '=', $id)->first();
        return json_encode($student);


    }

    public function update_class_test_marks(Request $request)
    {   
        $id = $request->id;

        $student=class_test_mark::find($id);
       
        $student->obtaining_marks = $request->update_marks;
       // file_put_contents('test.txt', $id);
       $student->save();
        



    }






    public function show_class_test_marks(Request $request)
    {

        $school_id= Session::get('school_id');; 

        $class = $request->class;
        $section = $request->section;
        $subject = $request->subject;
        $class_test_name = $request->class_test_name;



        $student = class_test_mark::where('class', '=', $class)->where('section','=',$section)->where('subject','=',$subject)->where('class_test_name','=',$class_test_name)->where('school_id','=',$school_id)->get();

        $data="";

        foreach($student as $student_list)

        {

            
            $roll = $student_list->student_roll;

            $obtaining_marks = $student_list->obtaining_marks;

            $full_marks = $student_list->full_marks;

            $name = student_list::where('roll_no','=',$roll)->where('class','=',$class)->where('section','=',$section)->first();

            $id = $student_list->id;

             
             $data .= '<tr>

                     
                     
                     <td>'.$roll.'</td>
                     <td>'.$name->name.'</td>
                     <td>'.$obtaining_marks.'</td>
                     <td>'.$full_marks.'</td>


                 <td>
                    <button onclick="GetUserDetails('.$id.')" class="btn btn-success ">Edit</button>
                </td>
               <td>
                    <button onclick="delete_data('.$id.')" class="btn btn-danger ">Delete</button>
                </td>

 
                    </tr>';
              
        }

       return $data;
    }

    public function getClassTest(Request $request)

    {
        $school_id= Session::get('school_id');;

        $class = $request->class;
        $section = $request->section;

        $class_tests =class_test_mark::where('class','=',$class)->where('section','=',$section)->where('school_id','=',$school_id)->distinct()->get(['class_test_name']);

        $data ="<option>Select Class Test </option>";

        for($i=0;$i<sizeof($class_tests);$i++)
        {
           $data.= '<option>'.$class_tests[$i]->class_test_name.'</option>';
        }

      
     // file_put_contents('test.txt',$class." ".$section);
       return $data;
        
    }


    public function view_class_test_result_interface()
    {
        $school_id= Session::get('school_id');;

        $class_sections = class_section::where('school_id','=',$school_id)->get();



        // $subjects = subject_list::where('school_id','=',$school_id)->get();

        return view('dashboard.view_class_test_result',['class_sections'=>$class_sections]);


    }


    public function save_class_test_marks(Request $request)
    {
    	$school_id= Session::get('school_id');;
        $rollno = $request->rollno;
        $rollno = explode(',', $rollno);
        $marks = $request->marks;
        $marks = explode(',', $marks);
        $class = $request->class;
        $section = $request->section;
        $subject = $request->subject;

     

        $class_test_name = $request->class_test_name;
        $class_test_date = $request->class_test_date;
        $full_marks = $request->full_marks;

        for($i=0; $i<sizeof($rollno);$i++)
        {

        	 // class_test_marks::create(['student_roll'=>$rollno[$i],'obtaining_marks'=>$marks[$i],'subject'=>$subject,'class'=>$class,'section'=>$section,'school_id'=>$school_id,'class_test_name'=>$class_test_name,'class_test_date'=>$class_test_date,'full_marks'=>$full_marks ]);
           
        	 //file_put_contents('test.txt', $rollno[$i]." ".$marks[$i]." ".$class." ".$section." ".$subject." ".$class_test_name.' '.$class_test_date.' '.$full_marks);
             $student = new class_test_mark();

             $student->student_roll = $rollno[$i];
             if($marks[$i]=="")
             {
                 $student->obtaining_marks = 0;
             }
             else{
             $student->obtaining_marks = $marks[$i];
             }
            
             $student->school_id = $school_id;
             $student->class_test_date = $class_test_date;
             $student->class_test_name = $class_test_name." ".$class_test_date;
             $student->subject = $subject;
             $student->section = $section;
             $student->class = $class;
             $student->full_marks = $full_marks;
             $student->save();

        }

    }
}
