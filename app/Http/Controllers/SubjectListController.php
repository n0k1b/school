<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\subject_list;
use App\teacher;
use Session;

class SubjectListController extends Controller
{
    //
    public function subject_add_interface()
    {

       $school_id= Session::get('school_id');; 
       $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();

        return view('dashboard.add_subject',['class_sections'=>$class_sections]);
    }

    public function add_subject(Request $request)
    {
        $school_id= Session::get('school_id');;
    	$subjects = $request->subject;
        $subjects = explode(',', $subjects); 
        
        	$marks = $request->marks;
        $marks = explode(',', $marks);  

    	$class =$request->class;

    	for($i=0;$i<sizeof($subjects);$i++)
    	{

               subject_list::create(['subject_name'=>$subjects[$i],'class_name'=>$class,'marks'=>$marks[$i],'school_id'=>$school_id]);
    	}

    	

    }
    
    
      public function getSubjectTeacher(Request $request)
    {
      
    	$teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;

    	$class = $request->class;

    	$subjects = subject_list::select(['subject_name'])->where('class_name', '=', $class)->where('school_id','=',$school_id)->get();
    	 $data ="<option>Enter Subject </option>";

    	for($i = 0 ;$i<sizeof($subjects);$i++)
    	{
          // file_put_contents('test.txt',$subjects[$i]->subject_name);

    		$data.= '<option>'.$subjects[$i]->subject_name.'</option>';
    	}
        // file_put_contents('test.txt', $data );

        return $data;
        
       
     //   // $section = explode(',', $section);
     //  $data ="";
     //  foreach($subjects as $subject)

     //  {
     //         $data.= '<option>'.$subject->suject_name.'</option>';
     //  }
    	// return $data;

      //file_put_contents('test.txt', $subject);
        

    }

     public function getSubject(Request $request)
    {

    	$school_id= Session::get('school_id');;

    	$class = $request->class;

    	$subjects = subject_list::select(['subject_name'])->where('class_name', '=', $class)->where('school_id','=',$school_id)->get();
    	 $data ="<option>Enter Subject </option>";

    	for($i = 0 ;$i<sizeof($subjects);$i++)
    	{
          // file_put_contents('test.txt',$subjects[$i]->subject_name);

    		$data.= '<option>'.$subjects[$i]->subject_name.'</option>';
    	}
        // file_put_contents('test.txt', $data );

        return $data;
        
       
     //   // $section = explode(',', $section);
     //  $data ="";
     //  foreach($subjects as $subject)

     //  {
     //         $data.= '<option>'.$subject->suject_name.'</option>';
     //  }
    	// return $data;

      //file_put_contents('test.txt', $subject);
        

    }


    public function view_subject_interface()

    {
    	$school_id= Session::get('school_id');;
    	$class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
    	return view('dashboard.view_subject',['class_sections'=>$class_sections]);


    }

    public function show_subject_update_modal(Request $request)
    {
        $id = $request->id;
        $subject = subject_list::where('id', '=', $id)->first();
        return json_encode($subject);
     

    }

    public function delete_subject(Request $request)

    {
    	$id = $request->id;
      subject_list::where('id',$id)->delete();
    }

    public function update_subject(Request $request)
    {
    	$id = $request->id;
        $subject=subject_list::find($id);
       
        $subject->subject_name = $request->subject;
        $subject->marks = $request->marks;

        //file_put_contents('test.txt',"HELLO");
       
        $subject->save();
    }



    public function show_subject_table(Request $request)
    {
    	$school_id= Session::get('school_id');;

    	$class = $request->class;
        

        $subject_lists = subject_list::where('class_name', '=', $class)->where('school_id','=',$school_id)->get();

        $data="";

        foreach($subject_lists as $subject_list)

        {

        
            $class = $subject_list->class_name;
            $subject = $subject_list->subject_name;
             $marks = $subject_list->marks;
           

            $id = $subject_list->id;

             
             $data .= '<tr>

                     
                     
                     <td>'.$subject.'</td>
                     <td>'.$marks.'</td>
                     
                     
                    
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
}
