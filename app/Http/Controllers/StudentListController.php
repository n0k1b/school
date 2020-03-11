<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\student_list;
use App\attendance;
use App\payment_record;
use App\class_test_mark;
use Session;

class StudentListController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $school_id= Session::get('school_id');

       file_put_contents('test.txt',$school_id);

    
       $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();

        return view('dashboard.add_student',['class_sections'=>$class_sections]);
    }
      public function view_all_student_interface()
      {
          $school_id= Session::get('school_id');
      
          $students = student_list::where('school_id','=',$school_id)->get();
          $total = sizeof($students);
           return view('dashboard.view_all_student',['students'=>$students,'total'=>$total]);
      }
     
     public function get_total_student(Request $request)
     {
         $school_id= Session::get('school_id');
         $class = $request->class;
         $section = $request->section;
         
         $num_rows = student_list::where('class','=',$class)->where('section','=',$section)->where('school_id','=',$school_id)->get();
         
         //file_put_contents('test.txt',sizeof($num_rows));
         return sizeof($num_rows);
     }
     
    public function show_individual_information(Request $request)
    {
        $school_id= Session::get('school_id');
        $student = student_list::where('class', '=', $request->class)->where('section','=',$request->section)->where('roll_no','=',$request->roll_no)->where('school_id','=',$school_id)->first();
        //file_put_contents('test.txt',$student);
        $present = attendance::where('class','=',$request->class)->where('section','=',$request->section)->where('rollno','=',$request->roll_no)->where('school_id','=',$school_id)->where('status','=',1)->where('present','=',1)->get();
        $absent = attendance::where('class','=',$request->class)->where('section','=',$request->section)->where('rollno','=',$request->roll_no)->where('school_id','=',$school_id)->where('status','=',1)->where('present','=',0)->get();
        file_put_contents('test.txt',$present);
       
         $total_payment = payment_record::where('class', '=', $request->class)->where('section','=',$request->section)->where('roll','=',$request->roll_no)->where('school_id','=',$school_id)->sum('paid_amount');
         $total = payment_record::where('class', '=', $request->class)->where('section','=',$request->section)->where('roll','=',$request->roll_no)->where('school_id','=',$school_id)->sum('total_amount');
         $due_amount = $total - $total_payment;
         $data = '<tr>

            <td>'.$student->name.'</td>
            <td>'.sizeof($present).'</td>
            <td>'.sizeof($absent).'</td>
            <td>'.$total_payment.'</td>
             <td>'.$due_amount.'</td>
         </tr>';

         return $data;
         
        // file_put_contents('test.txt', $student->name." ".$present." ".$absent." ".$total_payment);


    }

     public function view_student_information_interface()
    {

      $school_id= Session::get('school_id');
       $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();

        return view('dashboard.view_student_information',['class_sections'=>$class_sections]);
    }
  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $school_id= Session::get('school_id');
        $name = $request->name;
        $name = explode(',', $name);
        $roll_no = $request->rollno;
        $roll_no = explode(',', $roll_no);
        $contact_no = $request->number;
        $contact_no = explode(',', $contact_no);
        $class = $request->class;
        $section = $request->section;

        for($i=0; $i<sizeof($name);$i++)
        {
            student_list::create(['name'=>$name[$i],'roll_no'=>$roll_no[$i],'contact_no'=>$contact_no[$i],'class'=>$class,'section'=>$section,'school_id'=>$school_id ]);
        }

    }


    public function show_student()
    {
  $school_id= Session::get('school_id');
       $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
        return view ('dashboard.view_student',['class_sections'=>$class_sections]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function getStudentTermExam(Request $request)
   {
    $school_id= Session::get('school_id');
    $class = $request->class;
    $section = $request->section;
    $subject = $request->subject;
    $exam_type = $request->exam_type;
    $student = student_list::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no','ASC')->get();

    $data="";

        foreach($student as $student_list)

        {

            $name = $student_list->name;
            
            $roll = $student_list->roll_no;

            $ct_marks = 0;
             $class_test_marks = class_test_mark::where('student_roll','=',$roll)->where('class','=',$class)->where('section','=',$section)->where('school_id','=',$school_id)->where('subject','=',$subject)->where('class_test_name','LIKE',$exam_type."%")->get();
             for($i=0;$i<sizeof($class_test_marks);$i++)
             {
                 $ct_marks = $ct_marks+$class_test_marks[$i]->obtaining_marks;
             }
             if(sizeof($class_test_marks) == 0)
             {
                 $ct_marks = 0;
             }
             else{
             $ct_marks = $ct_marks/sizeof($class_test_marks);
             }
             
             $data .= '<tr>
                     
                     <input type= "hidden" name="rollno" value='.$roll.' class="form-control">

                     <td  >'.$roll.'</td>
                    
                     
                     
                     <td>'.$name.'</td>
                     <td><input type= "text" name="marks_ct" value="'.$ct_marks.'" class="form-control"></td>
                     <td><input type= "text" name="marks_subjective" class="form-control"></td>

                      <td><input type= "text" name="marks_objective" class="form-control"></td>
                    
                
 
                    </tr>';
              
        }

       return $data;

   }

   
   public function getStudent(Request $request)
   {
   $school_id= Session::get('school_id');
    $class = $request->class;
    $section = $request->section;
    $student = student_list::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no', 'ASC')->get();

    $data="";

        foreach($student as $student_list)

        {

            $name = $student_list->name;
            
            $roll = $student_list->roll_no;

            
           

             
             $data .= '<tr>
                     
                     <input type= "hidden" name="rollno" value='.$roll.' class="form-control">

                     <td  >'.$roll.'</td>
                    
                     
                     
                     <td>'.$name.'</td>

                     <td><input type= "text" name="marks" class="form-control"></td>
                    
                
 
                    </tr>';
              
        }

       return $data;

   }

    public function show_student_table(Request $request)
    {
         $school_id= Session::get('school_id');

        $class = $request->class;
        $section = $request->section;

        $student = student_list::where('class', '=', $class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no','ASC')->get();

        $data="";

        foreach($student as $student_list)

        {

            $name = $student_list->name;
            $class = $student_list->class;
            $section = $student_list->section;
            $roll = $student_list->roll_no;

            $mobile_number = $student_list->contact_no;

            $id = $student_list->id;

             
             $data .= '<tr>

                     <td>'.$name.'</td>
                     <td>'.$class.'</td>
                     <td>'.$section.'</td>
                     
                     
                     <td>'.$roll.'</td>
                     <td>'.$mobile_number.'</td>
                 <td>
                    <button onclick="GetUserDetails('.$id.')" class="btn btn-success ">Edit</button>
                </td>
               <td>
                    <button onclick="delete_data('.$id.')" class="btn btn-danger ">Delete</button>
                </td>
             
                 <td>
                    <button onclick="complain_box('.$id.')" class="btn btn-warning ">Complain</button>
                </td>
 
                    </tr>';
              
        }

       return $data;
    }


    public function delete_student_data(Request $request)
    {
      $id = $request->id;
      student_list::where('id',$id)->delete();
    }
    
    public function update_student_data(Request $request)
    {    $id = $request->id;
        $student=student_list::find($id);
        
        $student->class = $request->class;
        $student->section = $request->section;
        $student->contact_no = $request->contact_no;
        $student->name = $request->name;
        $student->roll_no = $request->roll_no;
        $student->save();
        



    }

    public function show_update_modal(Request $request)
    {
        $id = $request->id;
        $student = student_list::where('id', '=', $id)->first();
        return json_encode($student);


    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
