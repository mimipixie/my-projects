<?php
	
if(isset($_GET["eid"])){
	$eid = $_GET["eid"];
	include("sessionstart11.php");
	include("dbconnect11.php");
	include("checkadmin11.php");


$query="update users set validity=1 where userid='$eid' ";
$result= mysqli_query($conn,$query);

include("dbclose11.php");
	header('Location:apprvadmin11.php');
}
?>
