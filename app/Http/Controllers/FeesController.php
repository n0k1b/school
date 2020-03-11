<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fee_list;
use App\class_section;
use Session;


class FeesController extends Controller
{
    //

    public function add_fees_interface()

    {    
          $school_id= Session::get('school_id');

          
           $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();

     
          return view("dashboard.add_fees",['class_sections'=>$class_sections]);
    }
   public function view_all_fees_interface()
   {
        $school_id= Session::get('school_id');
         $students = fee_list::where('school_id','=',$school_id)->get();
          //$total = sizeof($students);
           return view('dashboard.view_all_fee',['students'=>$students]);
   }
    public function show_fees_table(Request $request)

    {
        $school_id= Session::get('school_id');;
        $class = $request->class;
        $fee_list = fee_list::where('school_id','=',$school_id)->where('class','=',$class)->get();

     //  file_put_contents('test.txt', $class." ".$fee_list);
        $data="";
        for($i=0;$i<sizeof($fee_list);$i++)
        {
         $data.='
            <tr>

              <td>'.$fee_list[$i]->fees_name.'</td>
              <td>'.$fee_list[$i]->amount.'</td>
            <td>
<button onclick="GetUserDetails('.$fee_list[$i]->id.')" class="btn btn-success ">Edit</button>
</td>
<td>
<button onclick="delete_data('.$fee_list[$i]->id.')" class="btn btn-danger ">Delete</button>
</td>

            </tr>

         ';
        }
       return $data;
    }

    public function view_fees_interface()

    {
         $school_id= Session::get('school_id');

      // $fees = fee_list::where('school_id','=',$school_id)->get();

          $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();

    
      return view ('dashboard.view_fees',['class_sections'=>$class_sections]); 
    }

    public function submit_fees(Request $request)
    {

     $school_id= Session::get('school_id');

       // file_put_contents('test.txt',$request->class);

        $fees = $request->fees;

        $fees = explode(',', $fees);

         $amount = $request->amount;

        $amount = explode(',', $amount);

        for($i=0;$i<sizeof($fees);$i++)
        {
        		fee_list::create(['fees_name'=>$fees[$i],'amount'=>$amount[$i],'class'=>$request->class,'school_id'=>$school_id]);
        }
    }

    public function show_fees_modal(Request $request)
    {
    $id = $request->id;
   	$fees = fee_list::where('id','=',$id)->first();
   	return json_encode($fees);
   
    }

    public function update_fees(Request $request)

    {
    
    	$id = $request->id;
    	$fees = fee_list::find($id);
    	$fees->fees_name = $request->update_fees;
        $fees->amount = $request->update_amount;
    	$fees->save();



    }

    public function delete_fees(Request $request)
    {
    	$id = $request->id;
      fee_list::where('id',$id)->delete();
    }
}
