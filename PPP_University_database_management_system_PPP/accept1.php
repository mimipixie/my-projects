<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
<?php
if(isset($_GET["id"])){
$iid=$_GET["id"];
$_SESSION["id"]=$iid;
}else{
	if (!empty($_POST)) {
		echo "uoo<br>";	
		$iid=$_SESSION["id"];
	}else{
		header('Location:offerSec1.php');
	}
}

$result=mysqli_query($conn,"select * from listsec where id='$iid'");
$ob=mysqli_fetch_object($result);
$sid=$ob->sid;
$cid=$ob->code;
$cre=$ob->credits;
?>

<?php



$r1 = $r2 = $r3 = $t1 = $t2 =$t3 = $seats= "";
$err=$err1=$r1Err = $r2Err = $r3Err = $t1Err = $t2Err = $t3Err = $sErr  = $emailErr 
		= $nameErr= $nameErr1 =$codeErr=$codeErr1 = $typeErr =$sidErr = $sidErr1 =  $sidErr2 =  "";
$gotoEm=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
	
  if (empty($_POST["seats"])) {
    $sErr = "required";
	$gotoEm=1;
  }  else {
	$seats = test_input($_POST["seats"]);
  }
    
	$r1 = $_POST["r1"];
	$r2 = $_POST["r2"];
	$t1 = $_POST["t1"];
	$t2 = $_POST["t2"];
	if($cre==4){ 
		$r3 = $_POST["r3"];
		$t3 = $_POST["t3"];
	}
    

} else{ $gotoEm=1;
}
  
if($gotoEm==0){
	$gooo=1;
	
	$result=mysqli_query($conn,"select * from listsec where (rid1='$r1' and slot1='$t1') or 
						 (rid2='$r1' and slot2='$t1') or    
						  (lid='$r1' and slot3='$t1') ");
	if($result->num_rows > 0 ) {
		$t1Err="non empty schedule";
		$gooo=0;
	}
	$result=mysqli_query($conn,"select * from listroom where rid='$r1' and seats<'$seats'  ");
	if($result->num_rows > 0 ) {
		$r1Err="not enough seats";
		$gooo=0;
	}

	
	$result=mysqli_query($conn,"select * from listsec where (rid1='$r2' and slot1='$t2') or 
						 (rid2='$r2' and slot2='$t2') or    
						  (lid='$r2' and slot3='$t2') ");
	if($result->num_rows > 0 ) {
		$t2Err="non empty schedule";
		$gooo=0;
	}
	$result=mysqli_query($conn,"select * from listroom where rid='$r2' and seats<'$seats'  ");
	if($result->num_rows > 0 ) {
		$r2Err="not enough seats";
		$gooo=0;
	}
	
	if($t1==$t2){
		$err1="timeclash";
		$gooo=0;
	}
	
	
	if($cre==4){
	if($t1==$t3 || $t2==$t3){
		$err1="timeclash";
		$gooo=0;
	}
	$result=mysqli_query($conn,"select * from listsec where (rid1='$r3' and slot1='$t3') or 
						 (rid2='$r3' and slot2='$t3') or    
						  (lid='$r3' and slot3='$t3') ");
	if($result->num_rows > 0 ) {
		$t3Err="non empty schedule";
		$gooo=0;
	}
	$result=mysqli_query($conn,"select * from listroom where rid='$r3' and seats<'$seats'  ");
	if($result->num_rows > 0 ) {
		$r3Err="not enough seats";
		$gooo=0;
	}
	}
	
	
	

	if($gooo==1 ){
			$up=mysqli_query($conn,"update listsec set seats='$seats'  where id='$iid'");
			$up=mysqli_query($conn,"update listsec set rid1='$r1'  where id='$iid'");
			$up=mysqli_query($conn,"update listsec set rid2='$r2'  where id='$iid'");
			$up=mysqli_query($conn,"update listsec set slot1='$t1'  where id='$iid'");
			$up=mysqli_query($conn,"update listsec set slot2='$t2'  where id='$iid'");
		if($cre==4){
			$up=mysqli_query($conn,"update listsec set lid='$r3'  where id='$iid'");
			$up=mysqli_query($conn,"update listsec set slot3='$t3'  where id='$iid'");
		}
		header('Location:offerSec1.php');
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
<h2>Section Details</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
  <br>  <br>
                  <label for="seats" id="preinput"> Seats  </label> <br>
                  <input type="text" name="seats" >
					<span class="r">*	<?php echo $sErr;?> </span>
  <br>
  
  
                  <label for="r1" id="preinput"> r1  </label> <br>
				  <select name="r1">
<?php
	$result=mysqli_query($conn,"select * from listroom where type='lecture' ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->rid;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->rid;?></option>
<?php
		}
	} 

?>
				  </select>
					<span class="r">*	<?php echo $r1Err;?> </span>
  <br>


                  <label for="t1" id="preinput"> t1  </label> <br>
				  <select name="t1">
<?php
	$result=mysqli_query($conn,"select * from listslot  ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->tid;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->tid;?></option>
<?php
		}
	} 

?>
				  </select>
					<span class="r">*	<?php echo $t1Err;?> </span>
  <br>

  
                  <label for="r2" id="preinput"> r2  </label> <br>
				  <select name="r2">
<?php
	$result=mysqli_query($conn,"select * from listroom where type='lecture' ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->rid;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->rid;?></option>
<?php
		}
	} 

?>
				  </select>
					<span class="r">*	<?php echo $r2Err;?> </span>
  <br>
  
  
                  <label for="t2" id="preinput"> t2  </label> <br>
				  <select name="t2">
<?php
	$result=mysqli_query($conn,"select * from listslot ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->tid;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->tid;?></option>
<?php
		}
	} 

?>
				  </select>
					<span class="r">*	<?php echo $t2Err;?> </span>
  <br>



  <?php if($cre==4){ ?>
                  <label for="r3" id="preinput"> r3  </label> <br>
				  <select name="r3">
<?php
	$result=mysqli_query($conn,"select * from listroom where type='lab' ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->rid;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->rid;?></option>
<?php
		}
	} 

?>
				  </select>
					<span class="r">*	<?php echo $r3Err;?> </span>
  <br>
  
  
  
                  <label for="t3" id="preinput"> t3  </label> <br>
				  <select name="t3">
<?php
	$result=mysqli_query($conn,"select * from listslot ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->tid;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->tid;?></option>
<?php
		}
	} 

?>
				  </select>
					<span class="r">*	<?php echo $t3Err;?> </span>
  <br>

<?php } ?>
					<span class="r">* <?php echo $err1;?> </span>  <br>
  <hr>
                  <input type="submit" name="submit" value="Ok" id="inputid" >
  <br>

</form>
</div>
</body>
</html>
