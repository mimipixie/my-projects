<?php
if(!isset($_SESSION["username"])){
if(isset($_COOKIE["username"])){
$id=$_COOKIE["username"];
$type=$_COOKIE["usertype"];

if($type=="admin"){
	$sql="select * from admin where username='$id' and status=1 ";
	$result=mysqli_query($conn,$sql);
	if($obj=mysqli_fetch_object($result)){
			$_SESSION["username"]=$obj->username;
			$_SESSION["userpw"]=$obj->password;
			$_SESSION["usertype"]=$type;
	}
	mysqli_free_result($result);
}else if($type=="faculty"){
	$sql="select * from faculty where username='$id'  and status=1 ";
	$result=mysqli_query($conn,$sql);
	if($obj=mysqli_fetch_object($result)){
			$_SESSION["username"]=$obj->username;
			$_SESSION["userpw"]=$obj->password;
			$_SESSION["usertype"]=$type;
	}
	mysqli_free_result($result);
}else{
	$sql="select * from student where username='$id'  and status=1 ";
	$result=mysqli_query($conn,$sql);
	if($obj=mysqli_fetch_object($result)){
			$_SESSION["username"]=$obj->username;
			$_SESSION["userpw"]=$obj->password;
			$_SESSION["usertype"]=$type;
	}
	mysqli_free_result($result);
}

}
}

?>
