<?php include("11start.php");?>


<div class="display">
<h5> ACTION </h5>
</div>
<div class="display">
<?php
	$genre="action";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>



<div class="display">
<h5> ADVENTURE </h5>
</div>
<div class="display">
<?php
	$genre="adventure";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>



<div class="display">
<h5> COMEDY </h5>
</div>
<div class="display">
<?php
	$genre="comedy";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>

<div class="display">
<h5> ROMANCE </h5>
</div>
<div class="display">
<?php
	$genre="romance";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>


<div class="display">
<h5> HORROR </h5>
</div>
<div class="display">
<?php
	$genre="horror";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>


<div class="display">
<h5> SCIENCE FICTION </h5>
</div>
<div class="display">
<?php
	$genre="sciencefiction";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>


<div class="display">
<h5> ANIMATION </h5>
</div>
<div class="display">
<?php
	$genre="animation";
$sql="select * from cinema where $genre='$genre' order by id asc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<4){
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
	$str= "more11.php?id=$id&type=$genre";
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
	echo " ";
}
?>
</div>




<?php include("11end.php");?>


