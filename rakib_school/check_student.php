<?php

  include("connection.php");
  require 'bdapps_cass_sdk.php';
  
  $contact_no =$_POST['mobile'];

   $updated_contact_no = "";
   
   for($i=3;$i<=13;$i++)
   
   {
       $updated_contact_no.=$contact_no[$i];
   }
  $sql = "select * from student_lists where contact_no = '$updated_contact_no'";
  $res = mysqli_query($conn,$sql);
  
  
  $num_rows = mysqli_num_rows($res);
  
  
  $sql5 = "select * from school_users where mobile_number = '$updated_contact_no'";
  $res5 = mysqli_query($conn,$sql5);
  $row5 = mysqli_fetch_array($res5);
  
  $address = $row5['mask'];
  
  $response = array();
  if($num_rows!=0)
  {
  $row = mysqli_fetch_array($res);
 
      $school_id = $row['school_id'];
      
      
      $sql2 = "Select * from school_lists where id = $school_id";
      $res2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_array($res2);
      
      $school_name = $row2['school_name'];
      $school_email = $row2['school_email'];
      $school_number = $row2['school_contact_no'];
      $ussd = $row2['keyword'];
      $app_id = $row2['app_id'];
      $app_password = $row2['app_password'];
      
        //file_put_contents("test2.txt",$address." ".$app_id." ".$app_password);
      
      
      if($address)
      {
          
        
       //file_put_contents("test2.txt",$address." ".$app_id." ".$app_password);
      try{
          
          $subscription = new Subscription('https://developer.bdapps.com/subscription/send',$app_id,$app_password);
      
     
      $t= $subscription->getStatus($address);
      
  
      
      if($t === "UNREGISTERED" )
      {
      $sub = "not_ok";
      }
      else
      {
          $sub = "ok";
      }
      }
      catch(exception $e)
      {
          file_put_contents("error.txt",$e);
      }
  }
  
  else
  
  {
      $sub = "not_ok";
  }
      
      
    
   // $sub = "ok";
    
      array_push($response,array('id'=>$row['id'],'response'=>'ok','name'=>$row['name'],'roll'=>$row['roll_no'],'class'=>$row['class'],'section'=>$row['section'],'school_id'=>$row['school_id'],'image'=>$row['image'],'school_name'=>$school_name,'school_mobile'=>$school_number,'school_email'=>$school_email,'ussd'=>$ussd,'sub'=>$sub));
  
  }
  else
  {
      array_push($response,array('response'=>'not_ok'));
  }
  
  echo json_encode($response);
   

?>