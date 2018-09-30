<?php
if(isset($_GET["id"])) {
include("dbconnect11.php");

$id    = $_GET["id"];
$query = "SELECT * FROM product WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
$ob=mysqli_fetch_object($result);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->image).'"/>';
include("dbclose11.php");
	
					
}

?>