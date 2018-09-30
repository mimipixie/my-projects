<?php
if(isset($_GET["id"])){
	include("sessionstart1.php");
	include("dbconnect1.php");

	$id=$_GET["id"];
	$sql2="select * from listsec where id='$id'  ";
	$resss=mysqli_query($conn,$sql2);
	$ob2=mysqli_fetch_object($resss);

	$t11 = $ob2->slot1;
	$t22 = $ob2->slot2;
	$t33 = $ob2->slot3;
	$cid1 = $ob2->code;
	$sid1 = $ob2->sid;
	$ss = $ob2->seats;
	$st = $ob2->numstd;
	$sa=$ss-$st;
//echo $t11.$t22.$t33."<br>";
			
	$err1="";
	$err2="";
	$err3="";
	$user=$_SESSION["username"];
	$sql="select * from regstd where stid='$user' ";
	$res=mysqli_query($conn,$sql);
	$ct=0;
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
	}
	if($ct<4){

		$res=mysqli_query($conn,$sql);
		$gooo=1;
		if($sa<=0){
			$err3="seats no available";
			$gooo=0;
		}
		while(($ob=mysqli_fetch_object($res))){
			
			$cid = $ob->cid;
			$sid = $ob->sid;
		
			$sql1="select * from listsec where code='$cid' and sid='$sid' ";
			$ress=mysqli_query($conn,$sql1);
			$ob1=mysqli_fetch_object($ress);

			$t1 = $ob1->slot1;
			$t2 = $ob1->slot2;
			$t3 = $ob1->slot3;
//echo $t1.$t2.$t3."<br>";

			
			if($t11!="" && ($t1==$t11 || $t2==$t11 || $t3==$t11 ) )
			{
//echo "1<br>";
				$gooo=0;
			}
			if($t22!="" && ($t1==$t22 || $t2==$t11 || $t3==$t22 ) )
			{
//echo "2<br>";
				$gooo=0;
			}
			if($t33!="" && ($t1==$t33 || $t2==$t33 || $t3==$t33 ) )
			{
//echo "3<br>";
				$gooo=0;
			}
			
			
	
		}

	
		if($gooo==1){
			$in=mysqli_query($conn,"insert into regstd
							(cid ,sid ,stid)
						values('$cid1','$sid1','$user')");
			$up=mysqli_query($conn,"update listsec set numstd=numstd+1  where id='$id'");
			header('Location:regStd1.php');
		}else{
			$err2="time conflict";
		}
	}else{
		$err1="4 courses has been registered already";
	}
		
		
		
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Student Database Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
<?php include("s1.php");?>
</style>
</head>
<body>
<?php include("b1.php");?>

<div class="display">
<hr>  <br>

					<span class="r">	<?php echo $err1;?> </span> <br>
					<span class="r">	<?php echo $err2;?> </span>
					<span class="r">	<?php echo $err3;?> </span>

<hr>  <br>
</div>

</body>
</html>
