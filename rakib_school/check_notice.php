<?php

  include("connection.php");
  
 //$contact_no ="+8801845318609"; 
 // $month ="05";
  
 $contact_no =$_POST['mobile'];
//   $month =$_POST['month'];

   $updated_contact_no = "";
   
   for($i=3;$i<=13;$i++)
   
   {
       $updated_contact_no.=$contact_no[$i];
   }
   
  $sql = "select * from student_lists where contact_no = '$updated_contact_no'";
  $res = mysqli_query($conn,$sql);

  
   $row = mysqli_fetch_array($res);
   
  $class = $row['class'];
 
  $roll = $row['roll_no'];
  $section = $row['section'];
  $school_id = $row['school_id'];
  
  $sql2 = "Select * from notices where (school_id = $school_id and class = '$class'   and section = '$section') OR (school_id = $school_id and class = 'all')  ";
  $res2 = mysqli_query($conn,$sql2);
  $response = array();
  
  while($row2 = mysqli_fetch_array($res2))
  {
      
     array_push($response,array('title'=>$row2['notice_title'],'notice'=>$row2['notice'],'date'=>$row2['date']));
      
  }

  
  
 echo json_encode($response);
  
  
  
  
   
 

?>