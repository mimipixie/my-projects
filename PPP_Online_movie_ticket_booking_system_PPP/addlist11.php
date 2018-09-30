<?php
if(isset($_POST["ss11"])  ){
	

$cid=$_SESSION["cinema"];

$query = "SELECT * FROM cinema WHERE id = '$cid'";
$result = mysqli_query($conn,$query) or die('Error, query failed');

$ob=mysqli_fetch_object($result);
$cn=$ob->name;

$un=$_SESSION["userid"];

$query="insert into bookmark(un,cn) values('$un','$cn')";
$result= mysqli_query($conn,$query);

}
?>
