<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<?php


$id = $sec = $sem = $code = $name =$designation = $sid1 = $sid2 =  $sid3 =  $sid4 = $gender =
			$email= $addr= "";
$err=$secErr = $idErr = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 = $aErr  = $emailErr 
		= $nameErr= $nameErr1 =$codeErr=$codeErr1 = $typeErr =$sidErr = $sidErr1 =  $sidErr2 =  "";
$gotoEm=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
	
  if (empty($_POST["sec"])) {
    $secErr = "section is required";
	$gotoEm=1;
  }  else {
	$sec = test_input($_POST["sec"]);
  }
    

} else{ $gotoEm=1;
}
  
if($gotoEm==0){

	$code=$_POST["code"];
	$user=$_SESSION["username"];
	$goo=1;
	$sql="select * from listsec where cid='$code' and sid='$sec' ";
	$res=mysqli_query($conn,$sql);
	$ob=mysqli_fetch_object($res);
		$cre=$ob->credits;
		$s1=$ob->sem1;
		$s2=$ob->sem2;
		$r1=$ob->rid;
		$t1=$ob->timeslot;
		$r2=$ob->rid2;
		$t2=$ob->timeslot2;
		if($cre==4){
		$r3=$ob->lid;
		$t3=$ob->timeslot3;
		}
		$ss=$ob->seats;
		$sa=$ob->numstd;
	$sql="select * from regstd where stid='$user' ";
	$res=mysqli_query($conn,$sql);
	$ct=0;
		while(($ob=mysqli_fetch_object($res))){
			$sid=$ob->sid;
			$cid=$ob->cid;
			$ct++;
			$sql="select * from listsec where cid='$cid' and sid='$sid' ";
			$ress=mysqli_query($conn,$sql);
			$ob1=mysqli_fetch_object($ress);
			$cre1=$ob1->credits;
			$t11=$ob1->timeslot;
			$t22=$ob1->timeslot2;
			if($cre1==4){
			$t33=$ob1->timeslot3;
			}
			if($t1==$t11 || $t1==$t22 || $t1==$t33 || $t2==$t11 || $t2==$t22 || $t2==$t33){
				$goo=0;
			}
		}
	if($ct<4 && $goo==1){
		
		if($sa<$ss){
			$insert=mysqli_query($conn,"insert into regstd
									(sid,cid,stid)
								values('$sec','$code','$user')");
			$sql="update listsec set numstd=numstd+1 where cid='$code' and sid='$sec' ";
			$res=mysqli_query($conn,$sql);
		header('Location:updated1.php');
		}else{
			echo "Section already full";
		}
	}else{
		echo "4 courses has been registered already";
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

<div class="form">
<h2>Course Reg</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
  <br>  <br>
                  <label for="code" id="preinput"> Code Name  </label> <br>
				  <select name="code">
<?php
	$result=mysqli_query($conn,"select * from listcrs");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->code;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->code;?></option>
<?php
		}
	} 

?>
				  </select>
  <br>
                  <label for="sec" id="preinput"> Section  </label> <br>
                  <input type="text" name="sec" placeholder="Enter # of sections" id="inputid">
					<span class="err">*	<?php echo $secErr;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit" value="Ok" id="inputid" >
  <br>

</form>
					<span class="err"><?php echo $err;?> </span>
</div>
</body>
</html>
