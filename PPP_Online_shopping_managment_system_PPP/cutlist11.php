<?php
if(isset($_POST["ss22"])  ){
include("dbconnect11.php");

$id=$_SESSION["product"];
$query="select * from product where id='$id'";
$res= mysqli_query($conn,$query);
$ob= mysqli_fetch_object($res);
$pname=$ob->name;
$uname=$_SESSION["userid"];

$query="delete from wishlist where user='$uname' and product='$pname' ";
$result= mysqli_query($conn,$query);

include("dbclose11.php");
}
?>
