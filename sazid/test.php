<?php 
   
   $a = $_POST['mobile'];
   
   echo $a;
   
   file_put_contents("test.txt",$a);


?>