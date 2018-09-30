<?php include("11startform.php");?>
<?php
if(isset($_GET["id"])  ){
	

$tid=$_GET["id"];

$query = "SELECT * FROM ticket WHERE id = '$tid'";
$result = mysqli_query($conn,$query) or die('Error, query failed');

$ob=mysqli_fetch_object($result);
$sid=$ob->schedule;
$price=$ob->price;
$date=$ob->date;

$un=$_SESSION["userid"];

$query="insert into cart(un,sid,tid,price,date,ord) values('$un','$sid','$tid','$price','$date',0)";
$result= mysqli_query($conn,$query);
$query = "update ticket set booking=1 WHERE id = '$tid'";
$result= mysqli_query($conn,$query);

	header('Location:bookticket11.php?id=$sid');
}
?>
