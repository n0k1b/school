<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\term_exam_mark;
use App\student_list;
use Session;

class TermExamMarksController extends Controller
{
    //
     

     public function delete_term_exam_marks(Request $request)
    {
      $id = $request->id;
      term_exam_mark::where('id',$id)->delete();
    }

    public function update_term_exam_marks(Request $request)
    {   
        $id = $request->id;

        $student=term_exam_mark::find($id);
       
        $student->obtaining_marks_subjective = $request->update_marks_subjective;
        $student->obtaining_marks_objective = $request->update_marks_objective;
        $student->obtaining_marks_ct = $request->update_marks_ct;
        $student->total_marks = $student->obtaining_marks_subjective+ $student->obtaining_marks_objective +  $student->obtaining_marks_ct;
       // file_put_contents('test.txt', $id);
       $student->save();
        



    }

    
     public function show_term_exam_marks_modal(Request $request)
    {
        $id = $request->id;
        $student = term_exam_mark::where('id', '=', $id)->first();
        return json_encode($student);


    }




    public function show_term_exam_marks(Request $request)

    {

         $school_id= Session::get('school_id'); 

        $class = $request->class;
        $section = $request->section;
        $subject = $request->subject;
        $exam_type = $request->exam_type;



        $student = term_exam_mark::where('class', '=', $class)->where('section','=',$section)->where('subject','=',$subject)->where('exam_type','=',$exam_type)->where('school_id','=',$school_id)->get();

        $data="";

        foreach($student as $student_list)

        {

            
            $roll = $student_list->rollno;

            $obtaining_marks_subjective = $student_list->obtaining_marks_subjective;
            $obtaining_marks_objective = $student_list->obtaining_marks_objective;
            $obtaining_marks_ct = $student_list->obtaining_marks_ct;

            $full_marks = $student_list->full_marks;

            $name = student_list::where('roll_no','=',$roll)->where('class','=',$class)->where('section','=',$section)->first();

            $id = $student_list->id;

             
             $data .= '<tr>

                     
                     
                     <td>'.$roll.'</td>
                     <td>'.$name->name.'</td>
                      <td>'.$obtaining_marks_ct.'</td>
                     <td>'.$obtaining_marks_subjective.'</td>
                     <td>'.$obtaining_marks_objective.'</td>
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


     public function show_individual_marks(Request $request)

    {

         $school_id= Session::get('school_id'); 

        $class = $request->class;
        $section = $request->section;
       
        $roll_no = $request->roll_no;

        $exam_type = $request->exam_type;



        $student = term_exam_mark::where('class','=',$class)->where('section','=',$section)->where('rollno','=',$roll_no)->where('exam_type','=',$exam_type)->where('school_id','=',$school_id)->get();

        //file_put_contents('test.txt', $class." ".$section." ".$roll_no." ".$exam_type);

       // file_put_contents('test.txt', $student);

        $data="";
        $total_number=0;
        $total_gpa=0;
        foreach($student as $student_list)

        {

            $total_number++;
           // $roll = $student_list->rollno;

            $subject = $student_list->subject;

            $obtaining_marks_subjective = $student_list->obtaining_marks_subjective;
            $obtaining_marks_objective = $student_list->obtaining_marks_objective;
            $obtaining_marks_ct = $student_list->obtaining_marks_ct;

            $total_marks = $obtaining_marks_subjective+$obtaining_marks_objective+$obtaining_marks_ct;

            $highest_marks = term_exam_mark::where('subject','=',$subject)->where('section','=',$section)->where('class','=',$class)->max('total_marks');

            $full_marks = $student_list->full_marks;

            if($total_marks>=80)
                $gpa = 5.00;
            else if($total_marks>=70 && $total_marks<=79 )
                $gpa = 4.00;
            else if($total_marks>=60 && $total_marks<=69)
                $gpa = 3.5;
            else if($total_marks>=50 && $total_marks<=59)
                $gpa = 3.00;
            else if($total_marks>=40 && $total_marks<=49)
                $gpa = 2.00;
            else
                $gpa = 0.00;

          $total_gpa = $total_gpa+$gpa;

         // $total_gpa = round($total_gpa/$total_number,2);

           // $name = student_list::where('roll_no','=',$roll)->where('class','=',$class)->where('section','=',$section)->first();

            $id = $student_list->id;

             
             $data .= '<tr>

                     
                     
                     <td>'.$subject.'</td>
                    
                     <td>'.$obtaining_marks_subjective.'</td>
                     <td>'.$obtaining_marks_objective.'</td>
                      <td>'.$obtaining_marks_ct.'</td>
                     <td>'.$total_marks.'</td>
                     <td>'.$highest_marks.'</td>
                     <td>'.$full_marks.'</td>
                     <td>'.$gpa.'</td>


                

 
                    </tr>';
              
        }

        // $ranking = term_exam_mark::select('total_marks')->where('c','=',$class)->where('class','=',$class)->orderBy('total_marks', 'desc')->get();

      //file_put_contents('test.txt', $ranking);

         $average_gpa = $total_gpa/$total_number;
         
         file_put_contents('test.txt',$total_gpa." ".$total_number);
        $data.= '<tr>

        <th style="text-align:center" colspan="7">Average GPA</th>
        <th >'.$average_gpa.'</th>

         </tr>
        
        ';

       return $data;

    }


       public function view_individual_marks_interface()
    {
        $school_id= Session::get('school_id');

        $class_sections = class_section::where('school_id','=',$school_id)->orderBy('class','ASC')->get();



        // $subjects = subject_list::where('school_id','=',$school_id)->get();

        return view('dashboard.individual_result',['class_sections'=>$class_sections]);


    }

    public function view_term_exam_marks_interface()
    {
        $school_id= Session::get('school_id');

        $class_sections = class_section::where('school_id','=',$school_id)->orderBy('class','ASC')->get();



        // $subjects = subject_list::where('school_id','=',$school_id)->get();

        return view('dashboard.view_term_exam_marks',['class_sections'=>$class_sections]);


    }

     public function add_term_exam_marks_interface()
    {
    	$school_id= Session::get('school_id');

    	$class_sections = class_section::where('school_id','=',$school_id)->orderBy('class','ASC')->get();



    	// $subjects = subject_list::where('school_id','=',$school_id)->get();

    	return view('dashboard.add_term_exam_marks',['class_sections'=>$class_sections]);


    }

    public function save_term_exam_marks(Request $request)
    {
    	$school_id= Session::get('school_id');
        $rollno = $request->rollno;
        $rollno = explode(',', $rollno);

        $marks_subjective = $request->marks_subjective;
        $marks_subjective = explode(',', $marks_subjective);

        $marks_objective = $request->marks_objective;
        $marks_objective = explode(',', $marks_objective);
        
         $marks_ct = $request->marks_ct;
         file_put_contents('test.txt',$marks_ct);
        $marks_ct = explode(',', $marks_ct);
        
        
    
        $class = $request->class;
        $section = $request->section;
        $subject = $request->subject;

     

        
        $exam_type = $request->exam_type;
        $full_marks = $request->full_marks;

        for($i=0; $i<sizeof($rollno);$i++)
        {

        	 // class_test_marks::create(['student_roll'=>$rollno[$i],'obtaining_marks'=>$marks[$i],'subject'=>$subject,'class'=>$class,'section'=>$section,'school_id'=>$school_id,'class_test_name'=>$class_test_name,'class_test_date'=>$class_test_date,'full_marks'=>$full_marks ]);
           
        	 // file_put_contents('test.txt', $rollno[$i]." ".$marks[$i]." ".$class." ".$section." ".$subject." ".$class_test_name.' '.$class_test_date.' '.$full_marks);
             $student = new term_exam_mark();

             $student->rollno = $rollno[$i];
             if($marks_subjective[$i] == '')
             {
             $student->obtaining_marks_subjective = 0;
             }
             else{
             $student->obtaining_marks_subjective = $marks_subjective[$i];
             }
             
             if($marks_objective[$i]=="")
             {
                 $student->obtaining_marks_objective = 0;
             }
             else
             {
                  $student->obtaining_marks_objective = $marks_objective[$i];
             }
             
            
              $student->obtaining_marks_ct = $marks_ct[$i];
             $student->school_id = $school_id;
             $student->exam_type = $exam_type;
             $student->total_marks= $student->obtaining_marks_objective+$student->obtaining_marks_subjective+$student->obtaining_marks_ct;
             $student->subject = $subject;
             $student->section = $section;
             $student->class = $class;
             $student->full_marks = $full_marks;
             $student->save();

        }

    }

}
