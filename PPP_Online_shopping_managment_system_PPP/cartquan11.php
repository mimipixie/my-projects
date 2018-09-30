<?php include("sessionstart11.php");?>
<?php include("cookielogin11.php");?>
<?php include("checklogin11.php");?>
<?php include("dbconnect11.php");?>
<?php
if(!empty($_GET)  ){

$uname=$_SESSION["userid"];
$pname=$_GET["name"];
$quantity=$_GET["q"];
$quantity1=$_GET["qq"];
if($quantity <= $quantity1){
	$query="update wishlist set quantity='$quantity' where user='$uname' 
					and product='$pname'  ";
	$res= mysqli_query($conn,$query);
}
include("dbclose11.php");
header('Location:cartitems11.php');
}
?>
