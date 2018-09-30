<?php include("sessionstart11.php");?>
<?php include("dbconnect11.php");?>
<?php include("cookielogin11.php");?>
<?php
if(isset($_GET["id"])) {
	include("dbconnect11.php");
	$id=$_GET["id"];
$query = "update users set validity=1 WHERE userid = '$id' ";
mysqli_query($conn, $query);
header('Location:admintable11.php');
}
?>

</body>
</html>
