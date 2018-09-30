<?php
if(isset($_GET["cid"])){
	include("sessionstart11.php");
include("dbconnect11.php");


$pname=$_GET["cid"];
$uname=$_SESSION["userid"];

$query="delete from wishlist where user='$uname' and cinema='$pname' ";
$result= mysqli_query($conn,$query);

include("dbclose11.php");
	header('Location:cartitems11.php');
}


?>