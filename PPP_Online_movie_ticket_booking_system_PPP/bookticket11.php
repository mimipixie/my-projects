<?php include("11start.php");?>
<?php include("checklogin11.php");?>



<?php
$un=$_SESSION["userid"];
if(isset($_GET["id"])){
	$_SESSION["sche"]=$_GET["id"];
	$id=$_GET["id"];
}
if(isset($_GET["tid"])  ){
	

$tid=$_GET["tid"];

$query = "SELECT * FROM ticket WHERE id = '$tid'";
$result = mysqli_query($conn,$query) or die('Error, query failed');

$ob=mysqli_fetch_object($result);
$sid=$ob->schedule;
$price=$ob->price;
$date=$ob->date;


$query="insert into cart(un,sid,tid,price,date,ord) values('$un','$sid','$tid','$price','$date',0)";
$result= mysqli_query($conn,$query);
$query = "update ticket set booking=1 WHERE id = '$tid'";
$result= mysqli_query($conn,$query);

}

?>
<hr>  <br>

<div class="display">



<?php



$sql="select * from ticket where schedule='$id' order by num asc";
$res=mysqli_query($conn,$sql);



if($res->num_rows >0){
	$ct=64;
	echo "<table>";
	while(($ob=mysqli_fetch_object($res))){
		$tid=$ob->id;
		$row=$ob->row +64;
		$num=$ob->num;
		$datee=$ob->date;
		$booking=$ob->booking;
		$str= "bookticket11.php?id=$id&tid=$tid";
		$str1 = chr($row);
		
$sql="select * from cart where date='$datee' and un='$un'";
$ress=mysqli_query($conn,$sql);
if($ress->num_rows >=20){
	$stop=1;
}else{$stop=0;};
		
		
		if($ct<$row){
			$ct=$row;
			if($ct>0){
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td><h4> $str1 </h4></td>";
					
		}
		if($booking=="0"){
				echo "<td>";
			if($stop==1){
				echo " || $num || ";
			}else{
		?>
		
		
			<a  href="<?php echo $str;?>" > <?php echo " || $num || ";?> </a>
		
		<?php
			}
				echo "</td>";
		}else{
				echo "<td>";
				echo "booked";
				echo "</td>";
		}
		
	}
	echo "</table>";
}
?>
</div>

</body>
</html>
