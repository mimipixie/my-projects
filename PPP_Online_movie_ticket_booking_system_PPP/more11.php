<?php include("sessionstart11.php");?>
<?php include("dbconnect11.php");?>
<?php include("cookielogin11.php");?>
<!DOCTYPE html>
<html>
<head>
<title>Movie Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
<?php include("s11.php");?>
</style>
</head>
<body>
<?php include("b11.php");?>
<?php include("dbconnect11.php");?>


<?php
if(isset($_GET["id"])) {
?>

<div class="display">
<?php
$id    = $_GET["id"];
$type    = $_GET["type"];
$sql="select * from cinema where '$type'!='' and id>='$id' order by id asc ";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<20){
		$ct++;
		$id=$ob->id;
		$str= "cinemainfo11.php?id=$id";
?>
	  <div class="gallery">
		<a  href="<?php echo $str;?>">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->image).'" 
						style="width:170px;height:170px;border:0;"/>'; ?>
		</a>
		<div ><center><?php echo " $ob->name ";	?></center></div>
	  </div>
<?php	
	}
if(isset($ob->id)) {
	$id=$ob->id;
	$str= "more11.php?id=$id&type=$type";
?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<a  href="<?php echo $str;?>">
		<img src="images\more.png" style="width:60px;height:60px;border:0;"/>
	</a>
<?php	
}
}else{
	echo "No such items here";
}
?>
</div>



<?php
}
include("dbclose11.php");
?>

</body>
</html>
