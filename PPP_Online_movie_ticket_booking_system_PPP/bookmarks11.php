<?php include("11start.php");?>
<?php include("checklogin11.php");?>


<div class="display">
<?php
$user=$_SESSION["userid"];
$sql="select * from bookmark where un='$user' ";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	
$ob=mysqli_fetch_object($res);
	
		$cn=$ob->cn;
		$str= "cinemainfo11.php?name=$cn";
$sql="select * from cinema where name='$cn' ";
$ress=mysqli_query($conn,$sql);
$obb=mysqli_fetch_object($ress);
?>
	  <div class="gallery">
		<a  href="<?php echo $str;?>">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $obb->image).'" 
						style="width:170px;height:170px;border:0;"/>'; ?>
		</a>
		<div ><center><?php echo " $cn ";	?></center></div>
	  </div>
<?php	
	
}else{
	echo "No bookmarks";
}

include("dbclose11.php");
?>
</div>






</body>
</html>
