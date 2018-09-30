<?php
if(isset($_GET["id"])) {
include("dbconnect1.php");

$id    = $_GET["id"];
$query = "SELECT * FROM groupsec WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
$ob=mysqli_fetch_object($result);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->file).'"/>';
include("dbclose11.php");
	
					
}

?>