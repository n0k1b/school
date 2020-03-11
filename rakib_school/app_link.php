<?php
include("connection.php");
	mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
	    $response=array();
        array_push($response,array('response'=>'https://play.google.com/store/apps/details?id=co.zubdroid.zubrein.shohozschool')); 
                     
        echo json_encode($response);
           
   
   


?>