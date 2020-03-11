<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use Session;
use App\teacher;


class ClassSectionController extends Controller
{
    public function show_form()
    {
    	return view('dashboard.class_section');
    }

    public function save_data(Request $request)
    {
       
      
     $school_id= Session::get('school_id');
    	$sections = $request->section;

    	//$sections = explode(',', $sections);
         
         $class = $request->class;
    	 
        
      
       	class_section::create(['section'=>$sections,'class'=>$class,'school_id'=>$school_id]);
       
    	// $student = new class_section();
    	// $student->class='5';
    	// $student->section='A';
    	// $student->school_id = 3;
    	// $student->save();


         


    }


    public function show_update_modal_class_section(Request $request)
    {
        $id = $request->id;
        $student = class_section::where('id', '=', $id)->first();
        return json_encode($student);
     

    }


    public function delete_class_section(Request $request)
    {
      $id = $request->id;
      class_section::where('id','=',$id)->delete();
    }

    public function update_class_section(Request $request)
    {
        $id = $request->id;
        $student=class_section::find($id);
       
        $student->class = $request->class;
        $student->section = $request->section;

        //file_put_contents('test.txt',"HELLO");
       
        $student->save();
    }

    public function view_class_section(Request $request)
    {
      $school_id= Session::get('school_id');;
      
      $class_section = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
       return view ('dashboard.view_class_section',['class_section'=>$class_section]); 

    }

    public function getSection(Request $request)
    {

    	$school_id= Session::get('school_id');;

    	$class = $request->class;
       //file_put_contents('test.txt',$school_id." ".$class);
    	$sections = class_section::where('class', '=', $class)->where('school_id','=',$school_id)->first();


       $section = $sections->section;
       $section = explode(',', $section);
      $data ="<option>Enter Section </option>";
      foreach($section as $section_list)

      {
             $data.= '<option>'.$section_list.'</option>';
      }
    	return $data;
        

    }
    
    
    public function getSectionTeacher(Request $request)
    {
        
         $teacher_id= Session::get('teacher_id');
      
      $teacher = teacher::where('id','=',$teacher_id)->first();
      
      $school_id = $teacher->school_id;
    

    	$class = $request->class;
       //file_put_contents('test.txt',$school_id." ".$class);
    	$sections = class_section::select(['section'])->where('class', '=', $class)->where('school_id','=',$school_id)->first();


       $section = $sections->section;
       $section = explode(',', $section);
      $data ="<option>Enter Section </option>";
      foreach($section as $section_list)

      {
             $data.= '<option>'.$section_list.'</option>';
      }
    	return $data;
        

    }
}
