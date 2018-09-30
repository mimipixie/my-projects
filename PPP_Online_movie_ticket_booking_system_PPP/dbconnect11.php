<?php
$conn= new mysqli("localhost","root","","mvitkt");
	if ($conn->connect_error) {
		die("Database connection failed: " . $conn->connect_error);
	} 
?>
