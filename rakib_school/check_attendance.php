<?php

  include("connection.php");
  
//   $contact_no ="+8801845318609"; //$_POST['mobile'];
//   $month ="05";//$_POST['month'];
  
  $contact_no =$_POST['mobile'];
  $month =$_POST['month'];

   $updated_contact_no = "";
   
   for($i=3;$i<=13;$i++)
   
   {
       $updated_contact_no.=$contact_no[$i];
   }
   //file_put_contents('test.txt',$updated_contact_no);
  $sql = "select * from student_lists where contact_no = '$updated_contact_no'";
  $res = mysqli_query($conn,$sql);
//  $num_rows = mysqli_num_rows($res);
  
   $row = mysqli_fetch_array($res);
   
  $class = $row['class'];
 
  $roll = $row['roll_no'];
  $section = $row['section'];
  $school_id = $row['school_id'];
  
  $sql2 = "select * from attendances where school_id = $school_id and rollno = $roll and class= '$class' and section = '$section' and attendance_date LIKE '%-$month-%' ";
  
  $res2 = mysqli_query($conn,$sql2);
  
  //$row2 = mysqli_fetch_array($res2);
  

  
  $date = $attendance_date[0].$attendance_date[1];
  
  $response = array();
  
  while($row2 = mysqli_fetch_array($res2))
  {
      
       $attendance_date = $row2['attendance_date'];
     $date = $attendance_date[0].$attendance_date[1];
     if($row2['present'] == true)
     {
         $attendance = "present";
     }
     else
     {
          $attendance = "absent";
     }
     
     array_push($response,array('day'=>$date,'attendance'=>$attendance));
      
  }

  
  
 echo json_encode($response);
  
  
  
  
   
 

?>