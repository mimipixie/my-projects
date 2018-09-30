<!DOCTYPE html>


<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkfac1.php");?>
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

<h1 align="center"> Grade Sheet </h1>

			 
<?php

$sid="";
$cid="";
$grade="";


$sidERR="";
$cidERR="";
$gradeERR="";



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
if(empty($_POST['sid']))
	{
		$error++;
		$sidERR="You must Fillup";
	}
	
	else
	{
		$sid=$_POST['sid'];
	}
if(empty($_POST['cid']))
	{
		$error++;
		$cidERR="You must Fillup";
	}
	
	else
	{
		$cid=$_POST['cid'];
	}
if(empty($_POST['grade']))
	{
		$error++;
		$gradeERR="You must Fillup";
	}
	
	else
	{
		$grade=$_POST['grade'];
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
$sql1="insert into grdsub (sid,cid,grade)values ('$sid','$cid','$grade')";
mysqli_query($connection, $sql1);	 
		 
		 
	
			header("Location:updated1.php");
    
	  
	}
}
	
	

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST">

<table align="center">


<tr>

<td>Student Id </td>
	<td><input type="Text" Name="sid" value="<?php if(isset($_POST['sid'])) echo $_POST['sid']; ?>" class="size"placeholder="sid" style="border:2px solid green;"/><span class="Error"><?php echo $sidERR;?></span><span class="Error">*</span></td>
</tr>

<tr>

<td>Course Id:</td>
	<td><input type="Text" Name="cid" value="<?php if(isset($_POST['cid'])) echo $_POST['cid']; ?>" class="size"placeholder="cid" style="border:2px solid green;"/><span class="Error"><?php echo $cidERR;?></span><span class="Error">*</span></td>
</tr>


<tr>

<td>Grade</td>
	<td><input type="Text" Name="grade" value="<?php if(isset($_POST['grade'])) echo $_POST['grade']; ?>" class="size"placeholder="grade" style="border:2px solid green;"/><span class="Error"><?php echo $gradeERR;?></span><span class="Error">*</span></td>
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
