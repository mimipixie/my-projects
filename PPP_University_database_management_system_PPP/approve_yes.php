<?php

         $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }    
    
		  
		  
if(isset($_GET['id']) != "") {
        $sid = $_GET['id'];
        
        $approve_yes = mysqli_query($connection, "update aid set approval='yes' WHERE sid ='$_GET[id]' ");
        if($approve_yes) {
            header("Location:show_aid.php");
            echo "accepted";
        } 
    else {
            mysqli_error($connection);
        }
    
        
            
        
    }
?>