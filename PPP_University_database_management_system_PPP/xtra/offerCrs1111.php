<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
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
    $secErr = "# of section is required";
	$gotoEm=1;
  }  else {
	$sec = test_input($_POST["sec"]);
  }
    

} else{ $gotoEm=1;
}
  
if($gotoEm==0){

	$code=$_POST["code"];
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
		$go=1;
	}	
	if($go==0){
		$sql="select * from listcrs where code='$code' ";
		$res=mysqli_query($conn,$sql);
		$ob=mysqli_fetch_object($res);
		$cre=$ob->credits;
		$dept=$ob->dept;
		$dcode=$ob->dcode;
		for($j=1; $j<=$sec ; $j++)      
		{
			$insert=mysqli_query($conn,"insert into listsec
									(sid,code,credits,dept,dcode,seats,numstd,sem1,sem2)
								values('$j','$code','$cre','$dept','$dcode',0,0,'$sem','$y')");
		
		}	  
		header('Location:updated1.php');
	}else{
		$err="Can't offer at this time period";
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
					<span class="err"><?php echo $err;?> </span>
<h2>Offer Course</h2> <br>
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
                  <label for="sec" id="preinput"> Sections  </label> <br>
                  <input type="text" name="sec" placeholder="Enter # of sections" id="inputid">
					<span class="err">*	<?php echo $secErr;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit" value="Ok" id="inputid" >
  <br>

</form>
</div>
</body>
</html>
