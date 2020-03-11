<?php
 

namespace App\Http\Controllers;



use Illuminate\Http\Request;


use App\Classes\UssdReceiver;
use App\Classes\UssdSender;
use App\Classes\UssdException;
use App\Classes\Logger;
 use App\Classes\Subscription;
use App\Classes\SubscriptionException;
use App\school_user;
use App\student_list;
use App\Classes\SMSSender;
use App\Classes\SMSServiceException;
use App\attendance;
use App\notice;
use App\class_test_mark;

use App\Classes\SubscriptionReceiver;

use App\payment_record;
use App\school_list;




class UssdController extends Controller
{
    
    
      public function ussd($appid,$apppassword)
    {
        //file_put_contents('hh.txt',"hello");
        date_default_timezone_set('Asia/Dhaka');
        //file_put_contents('test.txt','hello');
        
          $date = date('d-m-Y');
          
          $month = date("m");    // "02"
$m = date("F", mktime(0, 0, 0, $month));
//         $appid = "APP_015992";
//  $apppassword = "d531232d5e997484623c512602bf678c";


	$sender = new SMSSender("https://developer.bdapps.com/sms/send", $appid,$apppassword);
//file_put_contents('ussd.txt',$_SERVER['REMOTE_ADDR']);

$production=true;

	if($production==false){
		$ussdserverurl ='http://localhost:7000/ussd/send';
	}
	else{
		$ussdserverurl= 'https://developer.bdapps.com/ussd/send';
	}

try{
$receiver 	= new UssdReceiver();
$ussdSender = new UssdSender($ussdserverurl,$appid,$apppassword);
 $subscription = new Subscription('https://developer.bdapps.com/subscription/send',$apppassword,$appid);


// file_put_contents('text.txt',$receiver->getRequestID());
//$operations = new Operations();

//$receiverSessionId  =   $receiver->getSessionId();
$content 			= 	$receiver->getMessage(); // get the message content
$address 			= 	$receiver->getAddress(); // get the ussdSender's address
$requestId 			= 	$receiver->getRequestID(); // get the request ID
$applicationId 		= 	$receiver->getApplicationId(); // get application ID
$encoding 			=	$receiver->getEncoding(); // get the encoding value
$version 			= 	$receiver->getVersion(); // get the version
$sessionId 			= 	$receiver->getSessionId(); // get the session ID;
$ussdOperation 		= 	$receiver->getUssdOperation(); // get the ussd operation

$status = $subscription->getStatus($address);
//file_put_contents('test.txt',$status);



$responseMsg3 = array(
    "main" => " Welcome to School Guardian Communication
1.Attendance
2.Notice
3.Result
4.Payment



"
   
);


//file_put_contents('status.txt',$address);

$responseMsg = ($status == "REGISTERED")? "1. unsubscribe" : " Thank you for your Subscription.";


if ($ussdOperation  == "mo-init") {
   if($status != "UNREGISTERED"){
	   try {
	       
	       
		$ussdSender->ussd($sessionId, $responseMsg3['main'],$address);

	    } catch (Exception $e) {
			$ussdSender->ussd($sessionId, 'Sorry error occured try again',$address );
	    }
   }
   else {
	   
	    $mobile = "";
	    
	    for($i=5;$i<strlen($content);$i++)
	    {
	        $mobile.=$content[$i];
	    }
	    
	   
		try {
		    if(strlen($content)>7)
		    {
		        $avail = school_user::where('mobile_number',"=",$mobile)->first();
		        if($avail)
		        {
		            school_user::where('mobile_number',"=",$mobile)->update(['mask'=>$address]);
		        }
		        else
		        {
		    school_user::create(['mask'=>$address,'mobile_number'=>$mobile]);
		        }
		    }
		$ussdSender->ussd($sessionId, $responseMsg,$address,'mt-fin');
		$x = $subscription->subscribe($address);

		} catch (Exception $e) {
				$ussdSender->ussd($sessionId, 'Sorry error occured try again',$address );
		}
   }
	
}
else {
		switch ($receiver->getMessage()) {
			case "1":
			
                $school_user = school_user::where("mask",'=',$address)->first();
                
                //file_put_contents('test.txt',$school_user);
                if($school_user)
                {
                    $contact_number = $school_user->mobile_number;
                    
                    $student = student_list::where('contact_no','=',$contact_number)->first();
                    
                    if($student)
                    {
                       $present = attendance::where('school_id','=',$student->school_id)->where('rollno','=',$student->roll_no)->where("class",'=',$student->class)->where('section','=',$student->section)->where('attendance_date','=',$date)->first();
                    
                    if($present->present == 0)
                    {
                        $msg = "You children is absent at ".$date;
                    }
                    else
                    {
                         $msg = "You children is present at ".$date;
                    }
                    $msg2 = "You will receive message shortly";
             $ussdSender->ussd($sessionId, $msg2, $address,'mt-fin');
                      $sender->sms($msg,$address); 
                    }
                    
                    else
                    {
                       
                    $msg = "Your number is not registered on school database. Please contact with school authority";
                    $ussdSender->ussd($sessionId, $msg, $address,'mt-fin');
                     $sender->sms($msg,$address); 
                    }
                    
                    
                    
                }
                break;
                
                case "2":
                       $school_user = school_user::where("mask",'=',$address)->first();
                
                //file_put_contents('test.txt',$school_user);
                if($school_user)
                {
                    $contact_number = $school_user->mobile_number;
                    
                    $student = student_list::where('contact_no','=',$contact_number)->first();
                    
                    if($student)
                    {
                       $notice = notice::where('school_id','=',$student->school_id)->where('class','=','all')->orderBy('id', 'DESC')->first();
                    
                    if($notice)
                    {
                        $msg = $notice->notice;
                    }
                    else
                    {
                         $msg = "No notice available";
                    }
                    $msg2 = "You will receive message shortly";
             $ussdSender->ussd($sessionId, $msg2, $address,'mt-fin');
             $sender->setencoding('8');
                      $sender->sms($msg,$address); 
                    }
                    
                    else
                    {
                       
                    $msg = "Your number is not registered on school database. Please contact with school authority";
                    $ussdSender->ussd($sessionId, $msg, $address,'mt-fin');
                     $sender->sms($msg,$address); 
                    }
                    
                    
                    
                }
                
             break;
             
             case "3":
                 
                        $school_user = school_user::where("mask",'=',$address)->first();
                
                //file_put_contents('test.txt',$school_user);
                if($school_user)
                {
                    $contact_number = $school_user->mobile_number;
                    
                    $student = student_list::where('contact_no','=',$contact_number)->first();
                    
                    if($student)
                    {
                       $result = class_test_mark::where('school_id','=',$student->school_id)->where('student_roll','=',$student->roll_no)->where("class",'=',$student->class)->where('section','=',$student->section)->orderBy('id', 'DESC')->first();
                    
                    if($result)
                    {
                        $msg ="Your children get ".$result->obtaining_marks." out of ".$result->full_marks." in ".$result->subject." on ".$result->class_test_name ;
                    }
                    else
                    {
                         $msg = "No result available";
                    }
                    $msg2 = "You will receive message shortly";
             $ussdSender->ussd($sessionId, $msg2, $address,'mt-fin');
                      $sender->sms($msg,$address); 
                    }
                    
                    else
                    {
                       
                    $msg = "Your number is not registered on school database. Please contact with school authority";
                    $ussdSender->ussd($sessionId, $msg, $address,'mt-fin');
                     $sender->sms($msg,$address); 
                    }
                    
                    
                    
                }
                
             break;
             
             case "4":
                        $school_user = school_user::where("mask",'=',$address)->first();
                
                //file_put_contents('test.txt',$school_user);
                if($school_user)
                {
                    $contact_number = $school_user->mobile_number;
                    
                    $student = student_list::where('contact_no','=',$contact_number)->first();
                    
                    if($student)
                    {
                       $payment = payment_record::where('school_id','=',$student->school_id)->where('roll','=',$student->roll_no)->where("class",'=',$student->class)->where('section','=',$student->section)->where('payment_month','=',$m)->first();
                      
                      
                    
                    if($payment)
                    {
                        $due = $payment->total_amount - $payment->paid_amount;
                        
                        $msg = "Your children paid ".$payment->paid_amount. "tk , due ".$due."tk in this month";
                    }
                    else
                    {
                         $msg = "Monthly fee unpaid in this month";
                    }
                    $msg2 = "You will receive message shortly";
             $ussdSender->ussd($sessionId, $msg2, $address,'mt-fin');
                      $sender->sms($msg,$address); 
                    }
                    
                    else
                    {
                       
                    $msg = "Your number is not registered on school database. Please contact with school authority";
                    $ussdSender->ussd($sessionId, $msg, $address,'mt-fin');
                     $sender->sms($msg,$address); 
                    }
                    
                    
                    
                }
                
             break;
				
			default:
				//$operations->session_menu="main";
				//$operations->saveSesssion();
				$ussdSender->ussd($sessionId,'Incorrect option',$address);
				break;
		}
	
    }
}
catch (Exception $e){
 file_put_contents('USSDERROR.txt',$e);   
}
        
    }
    
     public function cnscSubscription()
   {
       
      // file_put_contents('test.txt','hello');
      $sender = new SMSSender("https://developer.bdapps.com/sms/send", 'APP_019695','dba5127e2046dfa6a59c1ca16ef1e6db');
        $receiver 	= new SubscriptionReceiver();
       $frequency = $receiver->getFrequency();
    $status = $receiver->getStatus();
    
      $application_id = $receiver->getApplicationId();
    $address = $receiver->getsubscriberId();
    $timestamp = $receiver->getTimestamp();
    school_user::where('mask','=',"tel:".$address)->update(['status'=>$status]);
     //file_put_contents('test.txt',$frequency." ".$status." ".$application_id." ".$address." ".$timestamp);
    
      $sender->sms('Download the app. https://play.google.com/store/apps/details?id=co.zubdroid.zubrein.sgc',"tel:".$address);
    
   }
    
    
       public function aafmSubscription()
   {
       
      // file_put_contents('test.txt','hello');
      $sender = new SMSSender("https://developer.bdapps.com/sms/send", 'APP_018275','a7e54f09b0d5eae5dd481deb4a637b53');
        $receiver 	= new SubscriptionReceiver();
       $frequency = $receiver->getFrequency();
    $status = $receiver->getStatus();
    
      $application_id = $receiver->getApplicationId();
    $address = $receiver->getsubscriberId();
    $timestamp = $receiver->getTimestamp();
    school_user::where('mask','=',"tel:".$address)->update(['status'=>$status]);
      $sender->sms('Download the app. https://play.google.com/store/apps/details?id=co.zubdroid.zubrein.sgc',"tel:".$address);
     // file_put_contents('test.txt',$frequency." ".$status." ".$application_id." ".$address." ".$timestamp);
   }
   
      public function rlsSubscription()
   {
       
      // file_put_contents('test.txt','hello');
      $sender = new SMSSender("https://developer.bdapps.com/sms/send", 'APP_019961','154159ae2138ffcbd98095fba59c008e');
        $receiver 	= new SubscriptionReceiver();
       $frequency = $receiver->getFrequency();
    $status = $receiver->getStatus();
    
      $application_id = $receiver->getApplicationId();
    $address = $receiver->getsubscriberId();
    $timestamp = $receiver->getTimestamp();
    school_user::where('mask','=',"tel:".$address)->update(['status'=>$status]);
      $sender->sms('Download the app. https://play.google.com/store/apps/details?id=co.zubdroid.zubrein.sgc',"tel:".$address);
     // file_put_contents('test.txt',$frequency." ".$status." ".$application_id." ".$address." ".$timestamp);
   }
   
      public function amisSubscription()
   {
       
      // file_put_contents('test.txt','hello');
      $sender = new SMSSender("https://developer.bdapps.com/sms/send", 'APP_020173','71ca88466b68f9efaef22bd2f4928dc8');
        $receiver 	= new SubscriptionReceiver();
       $frequency = $receiver->getFrequency();
    $status = $receiver->getStatus();
    
      $application_id = $receiver->getApplicationId();
    $address = $receiver->getsubscriberId();
    $timestamp = $receiver->getTimestamp();
    school_user::where('mask','=',"tel:".$address)->update(['status'=>$status]);
      $sender->sms('Download the app. https://play.google.com/store/apps/details?id=co.zubdroid.zubrein.sgc',"tel:".$address);
      //file_put_contents('test.txt',$frequency." ".$status." ".$application_id." ".$address." ".$timestamp);
   }
   
      public function spsncSubscription()
   {
       
      // file_put_contents('test.txt','hello');
      $sender = new SMSSender("https://developer.bdapps.com/sms/send", 'APP_020175','96bee211e55a1a1f96e076eb46cdaf71');
        $receiver 	= new SubscriptionReceiver();
       $frequency = $receiver->getFrequency();
    $status = $receiver->getStatus();
    
      $application_id = $receiver->getApplicationId();
    $address = $receiver->getsubscriberId();
    $timestamp = $receiver->getTimestamp();
    school_user::where('mask','=',"tel:".$address)->update(['status'=>$status]);
      $sender->sms('Download the app. https://play.google.com/store/apps/details?id=co.zubdroid.zubrein.sgc',"tel:".$address);
      //file_put_contents('test.txt',$frequency." ".$status." ".$application_id." ".$address." ".$timestamp);
   }
   
   public function sub()
   {
       $school_list = school_list::where('id','=',23)->get();
       for($i=0;$i<sizeof($school_list);$i++)
       {
           if($school_list[$i]->app_id)
           {
                $app_id = $school_list[$i]->app_id;
               $app_password = $school_list[$i]->app_password;
               
               $school_id = $school_list[$i]->id;
               $student_list = student_list::where('school_id','=',$school_id)->get();
               for($j=0;$j<sizeof($student_list);$j++)
               
               {
                   $contact_no = $student_list[$j]->contact_no;
                   if($contact_no)
                   {
                       $mask = school_user::where('mobile_number','=',$contact_no)->first();
                       if($mask)
                       {
                        $address = $mask->mask;
                        $subscription = new Subscription('https://developer.bdapps.com/subscription/send',$app_password,$app_id);
                        $status = $subscription->getStatus($address);
                       }
                        
                       
                   }
               }
               
               
              
           }
           
       }
   }
    
    
    
    
    

}
