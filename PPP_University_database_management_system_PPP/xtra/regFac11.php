<?php
if(isset($_GET["id"])){
	include("sessionstart1.php");
	include("dbconnect1.php");

	$id=$_GET["id"];
	$err="";
	$user=$_SESSION["username"];
	$sql="select * from regfac where fid='$user' ";
	$res=mysqli_query($conn,$sql);
	$ct=0;
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
	}
	if($ct<4){

		$res=mysqli_query($conn,$sql);
		$gooo=1;
		while(($ob=mysqli_fetch_object($res))){
			
			$cid = $ob->code;
			$sid = $ob->sid;
		
			$sql1="select * from listsec where code='$cid' and sid='$sid' ";
			$ress=mysqli_query($conn,$sql1);
			$ob1=mysqli_fetch_object($ress);

			$sql2="select * from listsec where id='$id'  ";
			$resss=mysqli_query($conn,$sql2);
			$ob2=mysqli_fetch_object($resss);

			$cre = $ob1->credits;
			$r1 = $ob1->rid1;
			$r2 = $ob1->rid2;
			$t1 = $ob1->slot1;
			$t2 = $ob1->slot2;
			if($cre==4){ 
				$r3 = $ob1->lid;
				$t3 = $ob1->slot3;
			}

			$cre = $ob2->credits;
			$r11 = $ob2->rid1;
			$r22 = $ob2->rid2;
			$t11 = $ob2->slot1;
			$t22 = $ob2->slot2;
				$r33 = $ob2->lid;
				$t33 = $ob2->slot3;
			
			
			if($t11!="" && ($t1==$t11 || $t2==$t11 || $t3==$t11 ) )
			
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
			
	
		}



	
		if($gooo==1){
			$in=mysqli_query($conn,"insert into regfac
							(cid ,sid ,fid)
						values('$cid','$id','$user')");
			header('Location:regfac1.php');
		}else{
			echo "Dept doesnt match";
		}
	}else{
		$err1="4 courses has been registered already";
	}
		
		
		
}


?>