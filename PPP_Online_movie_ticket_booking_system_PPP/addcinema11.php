<?php include("11startform.php");?>
<?php include("checkadmin11.php");?>

<?php

$name = $dir = $date = $time= $genre = $cast = $pic = $des = $trailer = $rate = 
		$nerr1 = $nerr2 = $rerr1 = 
		$action = $adventure = $romance = $comedy = $animation = $horror = $sciencefiction = "" ;

$goto=1;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if (empty($_POST["name"])) {
    $nerr1 = "Movie name is required";
	$goto=0;
  }  else {
	$name = test_input($_POST["name"]);
	$result=mysqli_query($conn,"select * from cinema where name='$name'");
	if($result->num_rows > 0 ) {   
		$nerr2= "Movie name already exists. Try new one";
		$goto=0;
	}
  }
  
	if(empty($_POST["rate"])){
		$rate=0;
	}else{
		if($_POST["rate"]<0 || $_POST["rate"]>10){
			$rerr1 = "Rate should be between 0 and 10 ";
			$goto=0;
		}else{
			$rate = test_input($_POST["rate"]);
		}

	}
  
  
}else{
	$goto=0;
}
  




if($goto==1){

$dir = test_input($_POST["dir"]);
$cast = test_input($_POST["cast"]);
$des = test_input($_POST["des"]);
$time = test_input($_POST["time"]);
$date = test_input($_POST["date"]);
$trailer = $_POST["trailer"];

if(isset($_POST["romance"])){
$romance = test_input($_POST["romance"]);
}
if(isset($_POST["comedy"])){
$comedy = test_input($_POST["comedy"]);
}
if(isset($_POST["horror"])){
$horror = test_input($_POST["horror"]);
}
if(isset($_POST["sciencefiction"])){
$sciencefiction = test_input($_POST["sciencefiction"]);
}
if(isset($_POST["action"])){
$action = test_input($_POST["action"]);
}
if(isset($_POST["adventure"])){
$adventure = test_input($_POST["adventure"]);
}
if(isset($_POST["animation"])){
$animation = test_input($_POST["animation"]);
}


$tmpName  = $_FILES["image"]["tmp_name"];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

$query = "INSERT INTO cinema ( name,dir,date, time, cast, des, trailer, rate,image,
				action,  adventure, romance, comedy,animation, horror, sciencefiction
	)	VALUES('$name', '$dir', '$date', '$time', '$cast', '$des', '$trailer', '$rate', '$content',
				'$action','$adventure','$romance','$comedy','$animation','$horror','$sciencefiction'

		)";

mysqli_query($conn,$query) or die('Error, query failed'); 
echo "<br>File  uploaded<br>";

header('Location:dbupdated11.php');

}


?>


<?php include("11midform.php");?>


<div class="display">

<h2>Movie Insert</h2> <br>
  <hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

	<label > Movie Name : </label> 
	<input type="text" name="name" id="n" <?php if(isset($_POST["name"])){ ?> 
				value="<?php echo $_POST["name"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $nerr1; ?> </span>
	<span class="r">	<?php echo $nerr2; ?> </span>
  <br>

	
    <label > Description :  </label>  <br>
    <textarea name="des" style="width:600px;height:150px" <?php if(isset($_POST["des"])){ ?> 
				value="<?php echo $_POST["des"]; ?>" <?php } ?> > </textarea>
	<br>

	
	<label > Director :  </label> 
	<input type="text" name="dir"  <?php if(isset($_POST["dir"])){ ?>
					value="<?php echo $_POST["dir"]; ?>" <?php } ?> > <br>


    <label > casting :  </label> <br>
    <textarea name="cast" style="width:600px;height:100px" <?php if(isset($_POST["cast"])){ ?> 
				value="<?php echo $_POST["cast"]; ?>" <?php } ?> > </textarea>
	<br>

	<label > Genre	: </label> 
	<input type="checkbox" name="action" value="action" > action
	<input type="checkbox" name="adventure" value="adventure" > adventure
	<input type="checkbox" name="comedy" value="comedy" > comedy
	<input type="checkbox" name="romance" value="romance" > romance
	<input type="checkbox" name="horror" value="horror" > horror
	<input type="checkbox" name="sciencefiction" value="science fiction" > science fiction
	<input type="checkbox" name="animation" value="animation" > animation
	<br> 


	<label > Release date :  </label> 
	<input type="date" name="date"  <?php if(isset($_POST["date"])){ ?>
					value="<?php echo $_POST["date"]; ?>" <?php } ?> > <br>

					
	<label > Run time (minutes) :  </label> 
	<input type="number" name="time"  <?php if(isset($_POST["time"])){ ?>
					value="<?php echo $_POST["time"]; ?>" <?php } ?> > <br>

	

    <label > Rating (out of 10):  </label> 
    <input type="number"  step="0.1" name="rate"  <?php if(isset($_POST["rate"])){ ?> 
				value="<?php echo $_POST["rate"]; ?>" <?php } ?> >
	<span class="r">	<?php echo $rerr1; ?> </span><br>

	
	
	<label > trailer link :  </label> <br>
	<input type="url" name="trailer"  <?php if(isset($_POST["trailer"])){ ?>
					value="<?php echo $_POST["trailer"]; ?>" <?php } ?> > <br>


	<label > Movie Image :  </label> 
    <input type="file" name="image"   >

	<br>
  <hr>
	<input type="submit" name="submit4" value="Insert"  >
  <br>

</form>
</div>


<?php include("11end.php");?>


