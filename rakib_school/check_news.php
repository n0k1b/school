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
  $school_id = $row['school_id'];
  
  $sql2 = "Select * from news_lists where school_id = $school_id ";
  $res2 = mysqli_query($conn,$sql2);
  $response = array();
  
  while($row2 = mysqli_fetch_array($res2))
  {
      
     array_push($response,array('news'=>$row2['news'],"title" =>$row2['title'],'image'=>$row2['image'],'date'=>$row2['date']));
      
  }

  
  
 echo json_encode($response);
  
  
  
  
   
 

?>