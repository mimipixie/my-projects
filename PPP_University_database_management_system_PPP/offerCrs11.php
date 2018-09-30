<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
<?php
if(!empty($_GET)  ){

$user=$_SESSION["username"];
$code=$_GET["code"];
$sec=$_GET["s"];
$y=date("Y");
$m=date("m");
$go=0;
if($m=="12"){
	$y++;
	$sem="Spring";
}else if($m=="04"){
	$sem="Summer";
}else if($m=="08"){
	$sem="Fall";
}else{
	$sem= unknown;
	$go=1;
}	
if($go<=1){

	$sql="select * from listcrs where code='$code' ";
	$res=mysqli_query($conn,$sql);
	$ob=mysqli_fetch_object($res);
	$cre=$ob->credits;
	$dept=$ob->dept;
	
	$sql="select * from listdep where did='$dept' ";
	$res=mysqli_query($conn,$sql);
	$ob1=mysqli_fetch_object($res);
	$dcode=$ob1->code;
	
	
	
	
	$dcode=$ob->dcode;
	for($j=1; $j<=$sec ; $j++)      
	{
		$insert=mysqli_query($conn,"insert into listsec
								(sid,code,credits,dept,dcode,seats,numstd,sem1,sem2)
							values('$j','$code','$cre','$dept','$dcode',0,0,'$sem','$y')");
	
	}	  
}
header('Location:offerCrs1.php');
}
?>
