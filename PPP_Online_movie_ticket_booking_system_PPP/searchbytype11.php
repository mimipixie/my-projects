<?php include("11start.php");?>

<?php
if(isset($_GET["stype"]) || isset($_GET["id"])) {
	if(isset($_GET["id"])){
		$id=$_GET["id"];
	}else{$id=1;}
	if(isset($_GET["stype"])){
		$stype = $_GET["stype"];
	}
?>

<div class="display">
<?php
$query = "SELECT * FROM cinema WHERE $stype != '' and id >= '$id' order by id asc";
$res = mysqli_query($conn,$query) or die('Error, query failed');
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<20){
		$ct++;
		$id=$ob->id;
		$str= "cinemainfo11.php?id=$id";
?>
	  <div class="gallery">
		<a href="<?php echo $str;?>">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->image).'" 
						style="width:170px;height:170px;border:0;"/>'; ?>
		</a>
		<div ><center><?php echo " $ob->name ";	?></center></div>
	  </div>
<?php	
	}
if(isset($ob->id)) {
	$id=$ob->id;
	$str= "searchbytype11.php?id=$id&stype=$stype";
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
?>

</body>
</html>
