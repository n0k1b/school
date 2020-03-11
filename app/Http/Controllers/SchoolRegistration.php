<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school_list;
use Hash;
use Session;
use Auth;
use Mail;
use App\account;
use App\income;
use DB;

class SchoolRegistration extends Controller
{
  
  public function change_password()
  {
    return view('dashboard.change_password');
  }
  
  
  public function forgot_password(Request $request)
  {
      $email = $request->school_email;
      
      $school = school_list::where('school_email','=',$email)->first();
      
      $password = $school->school_password;
      
      file_put_contents('test.txt',$password);
      
  }

    public function update_school_information(Request $request)
    {
       // file_put_contents('test.txt', "hello");
       
       $school_id= Session::get('school_id');
       
       school_list::where('id','=',$school_id)->update(['school_name'=>$request->school_name,'school_address'=>$request->school_address,'school_contact_no'=>$request->school_contact_no]);
       $school = school_list::where('id','=',$school_id)->first();
    return view('dashboard.update_school_information',['school'=>$school]);
        
    }

public function about()
{

   $schools = school_list::all();
    return view('about',['schools'=>$schools]);
    
}
public function update_school_information_interface()
{
   $school_id= Session::get('school_id');
   $school = school_list::where('id','=',$school_id)->first();
    return view('dashboard.update_school_information',['school'=>$school]);
}

    public function show_school()
    {

        $school_lists = school_list::all();



        // $subjects = subject_list::where('school_id','=',$school_id)->get();

        return view('admin.show_school',['school_lists'=>$school_lists]);
    }
    public function show_school_request()
    {
       
       $school_lists = school_list::where('isApproved','=',0)->get();



        // $subjects = subject_list::where('school_id','=',$school_id)->get();

        return view('admin.school_request',['school_lists'=>$school_lists]);
    }

    public function confirm_school(Request $request)
    {
        
         $school = school_list::where('id','=',$request->id)->first();
         $school_email = $school->school_email;
         $school_name = $school->school_name;

       //  file_put_contents('test.txt', $school_email);
         $data = array( 'email' => $school_email, 'first_name' =>"Shohoz School", 'from' => 'nokibevon8@gmail.com', 'from_name' => $school_name );

        Mail::send(['text'=>'mail'], ['name','Nokib'], function($message) use ($data) {
 
          $message->to( $data['email'] )->from( $data['from'], $data['first_name'] )->subject( 'Confirmation Mail' );
        });
 


        school_list::where('id','=',$request->id)->update(['isApproved'=>1]);
    }
    
    
    public function view_dashboard()
    {
          $school_id= Session::get('school_id');
         $school_name = school_list::where('id','=',$school_id)->first()->school_name;
         $keyword = school_list::where('id','=',$school_id)->first()->keyword;
         Session::put('keyword', $keyword);
        
         return view('dashboard.main_page',['school_name'=>$school_name]);
    }

    public function login(Request $request)
    {
        $this->login_validation($request);
        if (Auth::attempt ( array (
                    
                    'school_email' => $request->school_email,
                    'school_password' => $request->school_password
            ) )) {
                 
                 if(Auth::attempt ( array (
                    'school_email' => $request->school_email,
                    'school_password' => $request->school_password,
                    'isApproved' => 1
                    
            ) ))
                 {
                    $school = school_list::where('school_email','=',$request->school_email)->first();
                    
                Session::put('school_id', $school->id);
                return redirect ('dashboards');


                 }

                 else
                 {
                   Session::flash ( 'message', "Your School is not approved by admin. Please wait for admin approval. You will get confirmation email. Check your inbox as well as spam folder" );
                return redirect('login'); 
                 }

                            } 

            else {
                Session::flash ( 'message', "Invalid Email or Password , Please try again." );
                return redirect('login');
            }
    }
    
    
    public function change_password_update(Request $request)
    {
       $this->change_password_validation($request);
       
       $school_id= Session::get('school_id');
       
       $previous_password = $request->previous_password;
       
       
       
       $user = school_list::where("id",'=',$school_id)->first();
       
      
       
       if(Hash::check($previous_password,$user->school_password))
       {
           school_list::where("id",'=',$school_id)->update(['school_password'=>Hash::make($request->password)]);
            Session::flash ( 'success_message', "Password change successfully" );
       return redirect ('change_password');
           
       }
       else{
           Session::flash ( 'message', "Please enter the password correctly" );
       return redirect ('change_password');
       }
       
       
       
       
       
    }
    
    public function register(Request $request)
    {
    	$this->registration_validation($request);
    	 $request['school_password']=Hash::make($request->school_password);
        school_list::create($request->all());
        
        
           $data = array( 'email' => $request->school_email, 'first_name' =>"Shohoz School", 'from' => 'nokibevon8@gmail.com', 'from_name' => $request->school_name );

        Mail::send(['text'=>'mail2'], ['name','Nokib'], function($message) use ($data) {
 
          $message->to( $data['email'] )->from( $data['from'], $data['first_name'] )->subject( 'Confirmation Mail' );
        });
        
        Session::flash ( 'message', "Registration Success. Please wait for admin approval. You will be notified through your provided email. Check your email inbox as well as Spam Folder" );
       return redirect ('/');
    }

    public function login_validation($request)
    {
        return $this->validate($request,[
         'school_password'=> 'required',

         
         'school_email' => 'required|email',

        ]);
    }
     
     public function change_password_validation($request)
     {
         return $this->validate($request,[
         'previous_password'=> 'required|',

         
         'password' => 'required|confirmed',

        ]);
     }
    public function save_account_information(Request $request)
    {
        $school_id= Session::get('school_id');
        $expense_name = $request->expense_name;
        $expense_name = explode(',', $expense_name);
        $expense_amount = $request->expense_amount;
        $expense_amount = explode(',', $expense_amount);
        $comment = $request->comment;
        $comment = explode(',', $comment);
        $expense_date = $request->expense_date;
        

        for($i=0; $i<sizeof($expense_name);$i++)
        {
            account::create(['expense_name'=>$expense_name[$i],'expense_amount'=>$expense_amount[$i],'comment'=>$comment[$i],'expense_date'=>$expense_date,'school_id'=>$school_id ]);
        }

        
    }
    
    public function save_income_information(Request $request)
    {
        $school_id= Session::get('school_id');
        $income_name = $request->income_name;
        $income_name = explode(',', $income_name);
        
        //file_put_contents('test.txt',$income_name);
        
        $income_amount = $request->income_amount;
        $income_amount = explode(',', $income_amount);
        $comment = $request->comment;
        $comment = explode(',', $comment);
        $income_date = $request->income_date;
        

        for($i=0; $i<sizeof($income_amount);$i++)
        {
            income::create(['income_name'=>$income_name[$i],'income_amount'=>$income_amount[$i],'comment'=>$comment[$i],'income_date'=>$income_date,'school_id'=>$school_id ]);
        }

        
    }
    
    
    
    public function show_payment_table(Request $request)
    {
         $school_id= Session::get('school_id');
         $start_date = $request->start_date;
         $end_date = $request->end_date;

       
        $accounts = account::where('school_id', '=', $school_id)->whereBetween('expense_date',[$start_date,$end_date])->get();
        
    

        $data="";

        $total = 0;
        foreach($accounts as $account)

        {

            $expense_name = $account->expense_name;
            $expense_amount = $account->expense_amount;
            $total = $total+ $expense_amount;
            $comment = $account->comment;
            $expense_date = $account->expense_date;

            // $mobile_number = $student_list->contact_no;

             $id = $account->id;

             
             $data .= '<tr>

                     <td>'.$expense_name.'</td>
                     <td>'.$expense_amount.'</td>
                     <td>'.$comment.'</td>
                     
                     
                     <td>'.$expense_date.'</td>
                     
                 <td>
                    <button onclick="GetUserDetails('.$id.')" class="btn btn-success ">Edit</button>
                </td>
               <td>
                    <button onclick="delete_data('.$id.')" class="btn btn-danger ">Delete</button>
                </td>

 
                    </tr>';
              
        }
        
        $data .='<tr class="tr-header">
                 <th> Total </th>
                 <th colspan="5">'.$total.'</th>
                 
                </tr>';

       return $data;
    }
    
        public function show_payment_table_account(Request $request)
    {
         $school_id= Session::get('school_id');
         $start_date = $request->start_date;
         $end_date = $request->end_date;

       
        $accounts = account::where('school_id', '=', $school_id)->whereBetween('expense_date',[$start_date,$end_date])->get();
        
    

        $data="";

        $total = 0;
        foreach($accounts as $account)

        {

            $expense_name = $account->expense_name;
            $expense_amount = $account->expense_amount;
            $total = $total+ $expense_amount;
            $comment = $account->comment;
            $expense_date = $account->expense_date;

            // $mobile_number = $student_list->contact_no;

             $id = $account->id;

             
             $data .= '<tr>

                     <td>'.$expense_name.'</td>
                     <td>'.$expense_amount.'</td>
                     <td>'.$comment.'</td>
                     
                     
                     <td>'.$expense_date.'</td>
                     
               
 
                    </tr>';
              
        }
        
        $data .='<tr class="tr-header">
                 <th> Total </th>
                 <th colspan="5">'.$total.'</th>
                 
                </tr>';

       return $data;
    }
    
        public function show_profit_table(Request $request)
    {
         $school_id= Session::get('school_id');
         $start_date = $request->start_date;
         $end_date = $request->end_date;

       
        $expense = account::where('school_id', '=', $school_id)->whereBetween('expense_date',[$start_date,$end_date])->sum('expense_amount');
        $income = income::where('school_id', '=', $school_id)->whereBetween('income_date',[$start_date,$end_date])->sum('income_amount');
        
        $profit = $income - $expense;
        
    

       
      //  $total = 0;
       

           

             
             $data = '<tr>

                     <td>'.$income.'</td>
                     <td>'.$expense.'</td>
                     <td>'.$profit.'</td>
                     
                     
                   
                     
                
 
                    </tr>';
              
        
        
       

       return $data;
    }
    
     public function show_income_table(Request $request)
    {
         $school_id= Session::get('school_id');
         $start_date = $request->start_date;
         $end_date = $request->end_date;

       
        $accounts = income::where('school_id', '=', $school_id)->whereBetween('income_date',[$start_date,$end_date])->get();
        
    

        $data="";

        $total = 0;
        foreach($accounts as $account)

        {

            $expense_name = $account->income_name;
            $expense_amount = $account->income_amount;
            $total = $total+ $expense_amount;
            $comment = $account->comment;
            $expense_date = $account->income_date;

            // $mobile_number = $student_list->contact_no;

             $id = $account->id;

             
             $data .= '<tr>

                     <td>'.$expense_name.'</td>
                     <td>'.$expense_amount.'</td>
                     <td>'.$comment.'</td>
                     
                     
                     <td>'.$expense_date.'</td>
                     
                 <td>
                    <button onclick="GetUserDetails('.$id.')" class="btn btn-success ">Edit</button>
                </td>
               <td>
                    <button onclick="delete_data('.$id.')" class="btn btn-danger ">Delete</button>
                </td>

 
                    </tr>';
              
        }
        
        $data .='<tr class="tr-header">
                 <th> Total </th>
                 <th colspan="5">'.$total.'</th>
                 
                </tr>';

       return $data;
    }
    
    
      public function show_income_table_account(Request $request)
    {
         $school_id= Session::get('school_id');
         $start_date = $request->start_date;
         $end_date = $request->end_date;

       
        $accounts = income::where('school_id', '=', $school_id)->whereBetween('income_date',[$start_date,$end_date])->get();
        
    

        $data="";

        $total = 0;
        foreach($accounts as $account)

        {

            $expense_name = $account->income_name;
            $expense_amount = $account->income_amount;
            $total = $total+ $expense_amount;
            $comment = $account->comment;
            $expense_date = $account->income_date;

            // $mobile_number = $student_list->contact_no;

             $id = $account->id;

             
             $data .= '<tr>

                     <td>'.$expense_name.'</td>
                     <td>'.$expense_amount.'</td>
                     <td>'.$comment.'</td>
                     
                     
                     <td>'.$expense_date.'</td>
                     
               

 
                    </tr>';
              
        }
        
        $data .='<tr class="tr-header">
                 <th> Total </th>
                 <th colspan="5">'.$total.'</th>
                 
                </tr>';

       return $data;
    }
    
      public function delete_account_information(Request $request)
    {
      $id = $request->id;
      account::where('id',$id)->delete();
    }
    
        public function delete_income_information(Request $request)
    {
      $id = $request->id;
      income::where('id',$id)->delete();
    }
    
    
    
    public function show_account_update_modal(Request $request)
    {
          $id = $request->id;
        $student = account::where('id', '=', $id)->first();
        return json_encode($student);
    }
    
    public function show_income_update_modal(Request $request)
    {
          $id = $request->id;
        $student = income::where('id', '=', $id)->first();
        return json_encode($student);
    }
    
    public function update_account_information(Request $request)
    {
          $id = $request->id;
        $account=account::find($id);
        
        $account->expense_name = $request->expense_name;
        $account->expense_amount = $request->expense_amount;
        $account->comment = $request->comment;
    
        $account->save();
    }
    
    
    public function update_income_information(Request $request)
    {
          $id = $request->id;
        $account=income::find($id);
        
        $account->income_name = $request->expense_name;
        $account->income_amount = $request->expense_amount;
        $account->comment = $request->comment;
    
        $account->save();
    }
    
    public function registration_validation($request)
    {
    	return $this->validate($request,[
         'school_password'=> 'required|confirmed',

         'school_name'=>'required',
         'school_address'=>'required',

         'school_contact_no'=>'required',


         'school_email' => 'required|email|unique:school_lists',

    	]);
    }
}
