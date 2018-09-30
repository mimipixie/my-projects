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
        $delete = $_GET['id'];
        $delete = mysqli_query($connection, "DELETE FROM aid1 where sid='$_GET[id]' ");
        if($delete) {
            header("Location:show_aid.php");
        } else {
            echo mysqli_error($connection);
        }
    }
?>