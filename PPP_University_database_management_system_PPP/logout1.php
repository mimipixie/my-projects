<?php
if(isset($_SESSION["username"])){
	$id=$_SESSION["username"];
	$type=$_SESSION["usertype"];
	if($type=="admin"){
		$sql="update admin set status=0 where username='$id' ";
	}else if($type=="faculty"){
		$sql="update faculty set status=0 where username='$id' ";
	}else{
		$sql="update student set status=0 where username='$id' ";
	}
	if ($result=mysqli_query($conn,$sql)){
	session_destroy();
	}else{
		echo "Something went wrong :(";
	}
}
?>
