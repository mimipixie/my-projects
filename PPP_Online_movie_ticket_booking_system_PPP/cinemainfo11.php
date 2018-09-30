<?php include("11start.php");?>
<?php include("addlist11.php");?>
<?php include("cutlist11.php");?>

<?php
if(isset($_GET["name"])){
	$cn=$_GET["name"];
	$query = "SELECT * FROM cinema WHERE name = '$cn'";

	$result = mysqli_query($conn,$query) or die('Error, query failed');
	$ob=mysqli_fetch_object($result);
	$_SESSION["cinema"]=$ob->id;
}
if(isset($_GET["id"])){
	$_SESSION["cinema"]=$_GET["id"];
}
if(isset($_SESSION["cinema"])) {

$id    = $_SESSION["cinema"];
$query = "SELECT * FROM cinema WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
$ob=mysqli_fetch_object($result);

?>

<div class="displayprod">
<?php
		$id=$ob->id;
		$str= "download11.php?id=$id";
		echo "<br> <br>";
		echo " <h1>  $ob->name </h1> <br>";
		$cinema=$ob->name;
?>
	<div style="width:400px;">
		<a target="_blank" href="<?php echo $str;?>">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->image).'" 
						style="width:300px;height:400px;border:0;"/>'; ?>
		</a>
	</div >
	<div>
<?php 


	echo "<br> <br>";
	echo " <b> Rating : $ob->rate out of 10 </b><br>";
	echo "  Storyline : $ob->des <br>";
	echo "  Director : $ob->dir <br>";
	echo "  Starring : $ob->cast <br>";
	echo "  Catagory : $ob->romance $ob->comedy $ob->animation $ob->horror $ob->sciencefiction $ob->action $ob->adventure<br>";
	echo "  Release Date : $ob->date  <br>";
	echo "  Run time : $ob->time <br>";
		
$t=0;
if(isset($_SESSION["userid"]) ){
	$userid=$_SESSION["userid"];
	$query=" select * from bookmark where un='$userid' and cn='$cinema' ";
	$result = mysqli_query($conn,$query) or die('Error, query failed');
	$ob=mysqli_fetch_object($result);
	if(isset($ob->un)){
		$t=1;
	}else{
		$t=2;
	}
}
?>
		<br>
<?php if($t==2){	?>		
		<form name="s1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<button type="submit" name="ss11" value="submit" >
<?php
$sql="select * from db where name='10' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:180px;height:70px;border:0;"/>'; 
?>
				</button>
		</form>
		
<?php }else if($t==1){	?>		
		<form name="s2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<button type="submit" name="ss22"  value="submit">
<?php
$sql="select * from db where name='12' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:180px;height:70px;border:0;"/>'; 
?>
				</button>
		</form>
<?php }	?>		
</div>

<?php	
}
?>

<?php include("showtimecinema11.php");?>


