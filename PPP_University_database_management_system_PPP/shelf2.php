<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
<?php $userlib=$_SESSION["username"]; ?>
<!DOCTYPE html>


<html>
<head>
<style>

body 
{

		background-color:#FF1493;
}
p
{
	
        color:black;
        font-size:26px;
		
}
table 
{
	border:2px solid black;
    border-spacing: 10px;
	align:center;
	margin:6% auto auto 15%;
	 background-color:#FF00FF;
	width:70%;
	height:500%;
    border-radius:20px;
	
  
}


td
{
	border-spacing: 10px;
	 text-align:center;
   font-size:20px;
   border:1px solid black;
   border-collapse: collapse;
   padding: 12px;
   
}
th
{
	border-spacing: 10px;
	text-align:center;
   font-size:20px;
   border:1px solid black;
   border-collapse: collapse;
   padding: 5px;
   
}



ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}
</style>
</head>
<body>

<h1 align="center"> SHELF </h1>

			 
<?php

$shelfId="";
$size="";

$shelfIdERR="";
$sizeERR="";

$filled=0;


$error=0;


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}
if(empty($_POST['shelfId']))
	{
		$error++;
		$shelfIdERR="You must Fillup";
	}
	else
	{
		$shelfId=$_POST['shelfId'];
	}
	
	
if(empty($_POST['size']))
	{
		$error++;
		$sizeERR="You must Fillup";
	}
	else
	{
		$size=$_POST['size'];
	}
	
	
if(empty($_POST['Confirm']))
	{
		$error++;
		$ConfirmERR="You Should Confirm";
	}
	
	else
	{
		$Confirm=$_POST['Confirm'];
	}

if($error==0)
	{
		
		
	     $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }
		 
$shelfId = ($_POST['shelfId']);

$sql1="select * from shelf where shelfId='$shelfId'";
if($result=mysqli_query($connection, $sql1))
{
if(mysqli_num_rows($result)>0)
{
	echo "Already Used";
}
else{
	$sql2="insert into shelf values (DEFAULT,'".$_POST['shelfId']."',  '".$_POST['size']."', $filled) ";	
		 mysqli_query($connection, $sql2);
		 echo "Successfull";
	}
}
	}
}
	
	

?>	
	

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST">

<table align="center">


<tr>

<td>Shelf Id: </td>
	<td><input type="Text" Name="shelfId" value="<?php if(isset($_POST['shelfId'])) echo $_POST['shelfId']; ?>" class="size"placeholder="shelfId" style="border:2px solid green;"/><span class="Error"><?php echo $shelfIdERR;?></span><span class="Error">*</span></td>
</tr>

<tr>

<td>Size:  </td>
	<td><input type="Text" Name="size" value="<?php if(isset($_POST['size'])) echo $_POST['size']; ?>" class="size"placeholder="size" style="border:2px solid green;"/><span class="Error"><?php echo $sizeERR;?></span><span class="Error">*</span></td>
</tr>


<tr> 
<td> <input type="checkbox" Value="Confirm" Name="Confirm"/>  I Confirm </span><span class="Error">*</span></td>
 </tr>

<tr>
    <td><input type ="submit" value="Submit" style="border:2px solid green;">
	</td>		
</tr>		

	</table>
</form>
</body>
</html>
