<?php
if(isset($_GET["id"])){
	include("sessionstart1.php");
include("dbconnect1.php");


$id=$_GET["id"];
			$update=mysqli_query($conn,"delete from listsec where id ='$id'");

	header('Location:offerSec1.php');
}


?>
