<?php
if(isset($_GET["name"])){
	include("sessionstart11.php");
include("dbconnect11.php");


$pname=$_GET["name"];
$uname=$_SESSION["userid"];

$query="delete from wishlist where user='$uname' and product='$pname' ";
$result= mysqli_query($conn,$query);

include("dbclose11.php");
	header('Location:cartitems11.php');
}


?>