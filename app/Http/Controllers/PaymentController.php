<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\class_section;
use App\fee_list;
use App\payment_record;
use App\student_list;
use App\payment;
use Session;
use App\school_list;
use App\school_user;
use App\Classes\SMSSender;
use App\Classes\SMSServiceException;
class PaymentController extends Controller
{
    //
    public function add_payment_interface()
    {
    	  $school_id= Session::get('school_id');;

        $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();



        // $subjects = subject_list::where('school_id','=',$school_id)->get();

        return view('dashboard.add_payment',['class_sections'=>$class_sections]);
    }
    
     public function view_school_payment_interface()
    {
    	

        return view('dashboard.view_payment_school');
    }

    public function show_total_form(Request $request)
    {
    	$school_id= Session::get('school_id');;
      
        

    	$previous_total_amount = payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('roll','=',$request->roll)->where('school_id','=',$school_id)->where('payment_status','=',0)->sum('total_amount');

    	$previous_paid_amount = payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('roll','=',$request->roll)->where('school_id','=',$school_id)->where('payment_status','=',0)->sum('paid_amount');

    	$due_amount = $previous_total_amount-$previous_paid_amount;

    	 $paid_amount = $request->paid_amount;
       $paid_amount = explode(",", $paid_amount);
        $total = 0;
    	for($i=0;$i<sizeof($paid_amount);$i++)
    	{
            $total = $total+$paid_amount[$i];
    	}

    
    	
    
    	$data="";

    	$data.='<tr>
           <input type="hidden" id="total_amount" value='.$total.' >
           <th>Net Payable</th>
           <th>'.$total.'</th>

    	</tr>';
     

     $data.='<tr>
      <th>Paid Amount</th>
      <th width="30%"><input type="text" id= "paid_amount" class="form-control"></th>
     
     </tr>';

      
      
       

        return $data;
    }

    public function get_payment_form(Request $request)

    {
    	$school_id= Session::get('school_id');;
    	

    	$total_amount = payment_record::where('class','=',$request->class_name)->where('section','=',$request->section)->where('roll','=',$request->roll)->where('school_id','=',$school_id)->where('payment_status','=',0)->orderBy("id","DESC")->first();

    	

    // file_put_contents('test.txt', $total_amount." ".$paid_amount);

     if($total_amount)
     {
    	$due_amount = $total_amount->total_amount-$total_amount->paid_amount;
     }
     else
     {
         $due_amount = 0;
     }

    	///file_put_contents('test.txt',$payment_record);

    	$fee_list = fee_list::where('school_id','=',$school_id)->where('class','=',$request->class_name)->get();
    	$data="";
        for($i=0;$i<sizeof($fee_list);$i++)
        {
        	//file_put_contents('test.txt', $fee_list[$i]->fees_name);
          $data.='<tr>
                     
                     <input type="hidden" name="fees_name"  value = '.$fee_list[$i]->id.'>

                     <td  >'.$fee_list[$i]->fees_name.'</td>
                    
                
                     
                    

                      <td><input type= "text" name="paid_amount"  class="form-control " value='.$fee_list[$i]->amount.'></td>
                    
                
 
                    </tr>';

        }
        $data.='<tr>

           <td>Previous Due </td>

             <td><input type= "text" name="paid_amount"  class="form-control " value='.$due_amount.'></td>


        </tr>';



        

        return $data;
      
    }
    
    
     public function view_payment_school(Request $request)

    {
      $school_id= Session::get('school_id');;
       $month = $request->month;
      
      //file_put_contents('test.txt', "hello");
     
     
     $total_payable_amount_school = payment_record::where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('total_amount');
     $total_paid_amount_school = payment_record::where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('paid_amount');
     $total_due_amount_school = $total_payable_amount_school - $total_paid_amount_school;
      $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();
    //   	$total_amount = payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('total_amount');

    // 	$paid_amount = payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('paid_amount');
       $data = "";
    foreach($class_sections as $class_section)
    {
      $class = $class_section->class;
      $total_student = student_list::where('school_id','=',$school_id)->where('class','=',$class)->count('class');
      	$total_payable_amount = payment_record::where('class','=',$class)->where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('total_amount');
      	$total_paid_amount = payment_record::where('class','=',$class)->where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('paid_amount');
      	$total_due_amount = $total_payable_amount - $total_paid_amount;
      	
      	$total_paid_student = payment_record::where('class','=',$class)->where('school_id','=',$school_id)->where('payment_month','=',$month)->where('payment_status','=',1)->count('roll');
      		$total_unpaid_student = payment_record::where('class','=',$class)->where('school_id','=',$school_id)->where('payment_month','=',$month)->where('payment_status','=',0)->count('roll');
      		
      		$data.='<tr>
      			 <td>'.$class.'</td>
      		 <td>'.$total_student.'</td>
      		 <td>'.$total_payable_amount.'</td>
      		 <td>'.$total_paid_amount.'</td>
      		 <td>'.$total_due_amount.'</td>
      		 <td>'.$total_paid_student.'</td>
      		 <td>'.$total_unpaid_student.'</td>
      		 
      		</tr>';
      
    }
    
    $data.='
        <tr>
            <th style="color:red">Total Payable Amount</th>
            <th colspan="6">'.$total_payable_amount_school.'</th>
        </tr>
      ';
      
       $data.='
        <tr>
            <th style="color:red">Total Paid Amount</th>
            <th colspan="6">'.$total_paid_amount_school.'</th>
        </tr>
      ';
      
       $data.='
        <tr>
            <th style="color:red">Total Due Amount</th>
            <th colspan="6">'.$total_due_amount_school.'</th>
        </tr>
      ';

      return $data;
    }
    


    public function view_payment_class(Request $request)

    {
      $school_id= Session::get('school_id');;
      //file_put_contents('test.txt', "hello");
      $class  = $request->class;
      $section = $request->section;
      $month = $request->month;
    // $student_list = student_list::where('class','=',$class)->where('section','=',$section)->where('school_id','=',$school_id)->get();
      $payment_list = payment_record::where('class','=',$class)->where('section','=',$section)->where('school_id','=',$school_id)->where('payment_month','=',$month)->get();
      	$total_amount = payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('total_amount');

    	$paid_amount = payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('school_id','=',$school_id)->where('payment_month','=',$month)->sum('paid_amount');
       
       //file_put_contents("test.txt",$payment_list);
      //$total_student=0;
      $data ="";
      $total_paid = 0;
      $total_unpaid =0;
      
        $total_student = student_list::where('school_id','=',$school_id)->where('class','=',$class)->count('class');
      foreach($payment_list as $payment)
      {
        
         
         //$student = student_list::where("class",'=',$class)->first();
         
         //file_put_contents("test.txt",$payment->roll);
         $student =student_list::where('roll_no','=',$payment->roll)->where('class','=',$class)->where('section','=',$section)->where('school_id','=',$school_id)->orderBy('roll_no', 'ASC')->first();
       // file_put_contents("test.txt",$student);
        if($payment->total_amount == $payment->paid_amount)
        {
          $total_paid++;
          $payment_status = "Paid";
          $due_amount = $payment->total_amount- $payment->paid_amount;
          $data.='<tr>
           
         

         <td>'.$payment->roll.'</td>

         <td>'.$student->name.'</td>
         
         <td>'.$payment->total_amount.'</td>
         
         <td>'.$payment->paid_amount.'</td>
         
         <td>'.$due_amount.'</td>
         
         <td style="color:green">'.$payment_status.'</td>
        </tr>';

        }
        else
        {
          $total_unpaid++;
            $payment_status = "Unpaid";
             $due_amount = $payment->total_amount- $payment->paid_amount;
            $data.='<tr>
        


         <td>'.$payment->roll.'</td>
       
         <td>'.$student->name.'</td>
         <td>'.$payment->total_amount.'</td>
         <td>'.$payment->paid_amount.'</td>
          <td>'.$due_amount.'</td>
         
         <td style="color:red;">'.$payment_status.'</td>
        </tr>';

        }

      }
      
      $student = student_list::where('school_id','=',$school_id)->where('class','=',$class)->get();
      
      for($i=0;$i<sizeof($student);$i++)
      {
          if(!payment::where('school_id','=',$school_id)->where('class','=',$class)->where('month','=',$month)->where('roll','=',$student[$i]->roll_no)->first())
          {
              $total_unpaid++;
            $payment_status = "Unpaid";
             $due_amount = 0;
            $data.='<tr>
        


         <td>'.$student[$i]->roll_no.'</td>
       
         <td>'.$student[$i]->name.'</td>
         <td>0</td>
         <td>0</td>
          <td>0</td>
         
         <td style="color:red;">'.$payment_status.'</td>
        </tr>';
          }
      }
      
      $data.='<tr>
       <th colspan ="6"></th>
      </>';

      $data.='
        <tr>
            <th style="color:blue">Total studnet</th>
            <th colspan="5">'.$total_student.'</th>
        </tr>
      ';

        $data.='
        <tr>
            <th style="color:green">Total Paid</th>
            <th colspan="5">'.$total_paid.'</th>
        </tr>
      ';

      $data.='
        <tr>
            <th style="color:red">Total Unpaid</th>
            <th colspan="5">'.$total_unpaid.'</th>
        </tr>
      ';
      
       $data.='
        <tr>
            <th style="color:red">Total Payable Amount</th>
            <th colspan="5">'.$total_amount.'</th>
        </tr>
      ';
      
       $data.='
        <tr>
            <th style="color:red">Total Paid Amount</th>
            <th colspan="5">'.$paid_amount.'</th>
        </tr>
      ';


      return $data;
    }

    public function view_class_wise_payment_interface()
    {

    	$school_id= Session::get('school_id');;

        $class_sections = class_section::where('school_id','=',$school_id)->orderBy('id','ASC')->get();

        return view('dashboard.view_payment_class',['class_sections'=>$class_sections]);

    }

    public function save_payment_info(Request $request)

    {
    $school_id= Session::get('school_id');
    $app_id = school_list::where("id",'=',$school_id)->first()->app_id;
    	$app_password = school_list::where("id",'=',$school_id)->first()->app_password;
    	
    	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $app_id,$app_password);
    	
       $total_amount=$request->total_amount;
       $paid = $request->paid;
       $due = $total_amount-$paid;
       
       $msg ="Your children is paying ".$paid."tk ".".Due amount ".$due."tk" ;
       
       $roll = $request->roll;
       
       $contact_no = student_list::where('roll_no','=',$roll)->where('class','=',$request->class)->where('section','=',$request->section)->where('school_id','=',$school_id)->first()->contact_no;
       
      
          $user = school_user::where('mobile_number','=',$contact_no)->first();
          if($user)
          {
              $mask = $user->mask;
               $sender->setencoding('8');
              $sender->sms($msg,$mask);
          }
      
       
       if($total_amount==$paid)
       {
        $payment_status=1;
       }
       else

       {
        $payment_status=0;
       }
       //file_put_contents('test.txt', $total_amount." ".$paid);

       $paid_amount = $request->paid_amount;

       $paid_amount = explode(",", $paid_amount);

       $fees_id = $request->fees_id;
      // file_put_contents('test.txt', $fees_id);
       $fees_id = explode(",", $fees_id);

       date_default_timezone_set('Asia/Dhaka');
      $date = date('d-m-Y');
     // file_put_contents("test.txt", sizeof($payable_amount)." ".sizeof($paid_amount)." ".sizeof($fees_name));
 
       for($i=0;$i<sizeof($fees_id);$i++)
       {
       	  
         $fees_name = fee_list::where('id','=',$fees_id[$i])->first(); 

          payment::create(["school_id"=>$school_id,"roll"=>$request->roll,'class'=>$request->class,'section'=>$request->section,"fees_name"=>$fees_name->fees_name,'paid_amount'=>$paid_amount[$i],"month"=>$request->month,"date"=>$date ]);
       }

       payment_record::create(["school_id"=>$school_id,"roll"=>$request->roll,'class'=>$request->class,'section'=>$request->section,"payment_month"=>$request->month,"date"=>$date,'payment_status'=>$payment_status,'total_amount'=>$total_amount,'paid_amount'=>$paid]);
     
        if($payment_status == 1)
        {
        payment_record::where('class','=',$request->class)->where('section','=',$request->section)->where('roll','=',$request->roll)->where('school_id','=',$school_id)->where('payment_status','=',0)->update(['payment_status'=>1]);
      }



    }
}
