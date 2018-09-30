<?php
if(!isset($_SESSION["userid"])){
if(isset($_COOKIE["userid"])){
$id=$_COOKIE["userid"];
$sql=" select * from users where userid='$id' and status=1 ";

if ($result=mysqli_query($conn,$sql)){
	while($obj=mysqli_fetch_object($result)){
			$_SESSION["userid"]=$obj->userid;
			$_SESSION["pw"]=$obj->pw;
			$_SESSION["name"]=$obj->name;
			$_SESSION["type"]=$obj->type;
	}
	mysqli_free_result($result);
	//sleep(10);
}

}
}

?>
