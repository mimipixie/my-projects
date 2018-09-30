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

<h1 align="center"> Book List </h1>

			 
<?php

$name="";
$writer="";
$borrow="";
$shelfId="";
$category="";
$copy="";
$place="";

$nameERR="";
$writerERR="";
$borrowERR="";
$shelfIdERR="";
$categoryERR="";
$copyERR="";
$placeERR="";

$student="N/A";
$borrow=0;
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
if(empty($_POST['name']))
	{
		$error++;
		$nameERR="You must Fillup";

	}
	else
	{
		$name=$_POST['name'];
	}
	
if(empty($_POST['writer']))
	{
		$error++;
		$writerERR="You must Fillup";

	}
	else
	{
		$writer=$_POST['writer'];
	}
	
	if(empty($_POST['copy']))
	{
		$error++;
		$copyERR="You must Fillup";

	}
	else
	{
		$copy=$_POST['copy'];
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

	
	if(empty($_POST['category']))
	{
		$error++;
		$categoryERR="You must Fillup";

	}
	else
	{
		$category=$_POST['category'];
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
		 
		 
		$copy = $_POST['copy'];
		$borrow=$_POST['borrow'];
		$shelfId = $_POST['shelfId'];
		
		
$query1="select * from shelf where   shelfId= '$shelfId'";
if($Result=mysqli_query($connection, $query1))
{	

if(mysqli_num_rows($Result)>0)
{
	while($row=mysqli_fetch_array($Result))
					  {
						  
						  $size= $row['size'];
						  $filled= $row['filled'];
						}
						 $c=$size-$filled;
							if(($c)>0)
							{
								for($j=1; $j<=$copy ; $j++) {     
								echo "okay";
								echo $place;
								$name=$_POST['name'];
								$writer=$_POST['writer'];
								$borrow=$_POST['borrow'];
								if($borrow=='11')
								{
									$borrowed='0';
								}
								else if($borrow=='10')
								{
									$borrowed='-1';
								}
								
								$shelfId=$_POST['shelfId'];
								$category=$_POST['category'];
								$place=$filled+1;
								$sql2 = "insert into books (name,writer,borrow,student,shelfId,place,category, borrowed) values ( '$name' , '$writer' , '$borrow' ,
								 '$student' ,$shelfId , $place , '$category', '$borrowed')";
								 mysqli_query($connection, $sql2);
								$filled++;
								
								
								$sql3 = "update shelf set filled=filled+1 where shelfId='$shelfId' ";
								 mysqli_query($connection, $sql3);
								 
								 
			
								$place++;
								
									
								header("Location:welcome2.php");
							}
}
						else
							{
								echo "No seat available";
							}
}

else
{
	echo "Shelf Number is not Correct!";
}

    
	}
	}
}
	
?>	
	

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST">

<table align="center">


<tr>
<td>Book Name: </td>
	<td><input type="Text" Name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class="size"placeholder="name" style="border:2px solid green;"/><span class="Error"><?php echo $nameERR;?></span><span class="Error">*</span></td>
</tr>

<tr>
<td>Writer: </td>
	<td><input type="Text" Name="writer" value="<?php if(isset($_POST['writer'])) echo $_POST['writer']; ?>" class="size"placeholder="writer" style="border:2px solid green;"/><span class="Error"><?php echo $writerERR;?></span><span class="Error">*</span></td>
</tr>

<tr>
<td>Copy: </td>
	<td><input type="Text" Name="copy" value="<?php if(isset($_POST['copy'])) echo $_POST['copy']; ?>" class="size"placeholder="copy" style="border:2px solid green;"/><span class="Error"><?php echo $copyERR;?></span><span class="Error">*</span></td>
</tr>

<tr>
<td>Borrow option : </td>
	<td>
				<select name="borrow">
							<option value="11" "selected">Can be borrowed</option>
							<option value="10">Not</option>
				  </select>

	</td>
</tr>

<tr>
<td>Shelf No. : </td>

	<td>
				  <select name="shelfId">
<?php
	$result=mysqli_query($conn,"select * from shelf where size>filled ");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->shelfId;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->shelfId;?></option>
<?php
		}
	} 

?>
				  </select>

	</td>
	
	
	
				  </select>

</tr>

<tr>
<td>Category: </td>
	<td><input type="Text" Name="category" value="<?php if(isset($_POST['category'])) echo $_POST['category']; ?>" class="size"placeholder="category" style="border:2px solid green;"/><span class="Error"><?php echo $categoryERR;?></span><span class="Error">*</span></td>
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
