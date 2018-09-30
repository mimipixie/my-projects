<?php include("11start.php");?>
<?php include("checklogin11.php");?>

<?php
$un=$_SESSION["userid"];
if(isset($_GET["tid"])  ){
	

$tid=$_GET["tid"];


$query = "delete from cart  WHERE tid = '$tid'";
$result= mysqli_query($conn,$query);
$query = "update ticket set booking=0 WHERE id = '$tid'";
$result= mysqli_query($conn,$query);

}

?>

<div class="display">
<?php
$user=$_SESSION["userid"];
$sql="select * from cart where un='$user' ";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	$ctt=0;
	echo "<table>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>TID</th>";
	echo "<th>Date</th>";
	echo "<th>Ticket Price</th>";
	echo "<th></th>";
	echo "</tr>";
	
	$sum=0;
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$tid=$ob->tid;
		$price=$ob->price;
		$date=$ob->date;
		
		$ctt+=$price;
		
if($date <= date("Y-m-d")){
	$stop=1;
}else{$stop=0;};

		$str="cartitems11.php?tid=$tid";
		echo "<tr>";
			echo "<td> $ct </td>";  
			echo "<td> $tid </td>";  
			echo "<td> $date </td>";
			echo "<td> $price </td>";
				
			echo "<td>";
			if($stop==1){
				echo "Not removable";
			}else{
			?> <a href="<?php echo $str;?>">Remove</a>	 
			<?php }echo "</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<th colspan=\"5\"><center>Total price $ctt BDT</center></th>";
	echo "</tr>";

	echo "</table>";
}else{
	echo "No items";
}

?>
</div>






</body>
</html>
