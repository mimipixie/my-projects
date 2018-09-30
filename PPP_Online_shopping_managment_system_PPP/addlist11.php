<?php
if(isset($_POST["ss11"])  ){
	
include("dbconnect11.php");

$id=$_SESSION["product"];
$query="select * from product where id='$id'";
$res= mysqli_query($conn,$query);
$ob= mysqli_fetch_object($res);
$pname=$ob->name;
$uname=$_SESSION["userid"];

$query="insert into wishlist(user,product,quantity,cart,bill,payment) values('$uname','$pname',1,1,0,0)";
$result= mysqli_query($conn,$query);

include("dbclose11.php");
}
?>
