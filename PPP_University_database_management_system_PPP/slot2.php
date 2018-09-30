<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
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

<h1 align="center"> Slot List </h1>

			 
<?php

$tid="";
$day="";
$tfrom="";
$tto="";

$slotERR="";
$dayERR="";
$tfromERR="";
$ttoERR="";
$matchERR="";


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
if(empty($_POST['tid']))
	{
		$error++;
		$slotERR="please fill up";
	}
	
	else
	{
		$tid=$_POST['tid'];
	}
if(empty($_POST['day']))
	{
		$error++;
		$dayERR="You must Fillup";
	}
	
	else
	{
		$day=$_POST['day'];
	}
if(empty($_POST['tfrom']))
	{
		$error++;
		$tfromERR="You must Fillup";
	}
	else
	{
		$tfrom=$_POST['tfrom'];
	}
if(empty($_POST['tto']))
	{
		$error++;
		$ttoERR="You must Fillup";
	}
	
	else
	{
		$tto=$_POST['tto'];
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
		 
$day = ($_POST['day']);
$tfrom= ($_POST['tfrom']);
$tto= ($_POST['tto']);

$sql1="select * from listslot where day='$day'  and tfrom= '$tfrom' and tto= '$tto'";
if($result=mysqli_query($connection, $sql1))
{
if(mysqli_num_rows($result)>0)
{
	echo "Already Used";
}
else{
	$sql2="insert into listslot values (DEFAULT,'".$_POST['tid']."','".$_POST['day']."',  '".$_POST['tfrom']."', '".$_POST['tto']."') ";	
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

<td>Slot ID: </td>
	<td><input type="Text" Name="tid" value="<?php if(isset($_POST['tid'])) echo $_POST['tid']; ?>" class="size"placeholder="tid" style="border:2px solid green;"/><span class="Error"><?php echo $slotERR;?></span><span class="Error">*</span></td>
</tr>
<tr>

<td>Day: </td>
	<td><input type="Text" Name="day" value="<?php if(isset($_POST['day'])) echo $_POST['day']; ?>" class="size"placeholder="day" style="border:2px solid green;"/><span class="Error"><?php echo $dayERR;?></span><span class="Error">*</span></td>
</tr>

<tr>

<td>From time: </td>
	<td><input type="Text" Name="tfrom" value="<?php if(isset($_POST['tfrom'])) echo $_POST['tfrom']; ?>" class="size"placeholder="tfrom" style="border:2px solid green;"/><span class="Error"><?php echo $tfromERR;?></span><span class="Error">*</span></td>
</tr>


<td>To time: </td>
	<td><input type="Text" Name="tto" value="<?php if(isset($_POST['tto'])) echo $_POST['tto']; ?>" class="size"placeholder="tto" style="border:2px solid green;"/><span class="Error"><?php echo $ttoERR;?></span><span class="Error">*</span></td>
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
