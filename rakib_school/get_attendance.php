<?php

 include("connection.php");
 
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
 
   $contact_no =$_POST['mobile'];
   
    $updated_contact_no = "";
   
   for($i=3;$i<=13;$i++)
   
   {
       $updated_contact_no.=$contact_no[$i];
   }
   //file_put_contents('test.txt',$updated_contact_no);
  $sql = "select * from student_lists where contact_no = '$updated_contact_no'";
  $res = mysqli_query($conn,$sql);
  
  $row = mysqli_fetch_array($res);
  
  
  $class = $row['class'];
 
  $roll = $row['roll_no'];
  $section = $row['section'];
  $school_id = $row['school_id'];
  
  $sql2 = "select * from attendances where school_id = $school_id and rollno = $roll and class= '$class' and section = '$section' and attendance_date between '$date1' and '$date2' ORDER BY attendance_date ";
  
  $res2 = mysqli_query($conn,$sql2);
  
  $response = array();
  
  while($row2 = mysqli_fetch_array($res2))
  {
       if($row2['present'] == true)
     {
         $attendance = "present";
     }
     else
     {
          $attendance = "absent";
     }
     
       array_push($response,array('day'=>$row2['attendance_date'],'attendance'=>$attendance));
  }

 echo json_encode($response);

?>
