<?php
	
if(isset($_GET["eid"])){
	$eid = $_GET["eid"];
	include("sessionstart11.php");
	include("dbconnect11.php");
	include("checkadmin11.php");


$query="delete from users where userid='$eid' ";
$result= mysqli_query($conn,$query);

include("dbclose11.php");
	header('Location:apprvadmin11.php');
}
?>

