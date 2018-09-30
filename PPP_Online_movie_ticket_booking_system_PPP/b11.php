<div class="d1">
<?php
$sql="select * from db where name='1' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:150px;height:180px;border:0;"/>'; 
?>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="showtimedate11.php">Movie Showtimes</a>
</div>
<div id="mySidenav1" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
  <a href="searchbytype11.php?stype=action">action</a>
  <a href="searchbytype11.php?stype=adventure">adventure</a>
  <a href="searchbytype11.php?stype=romance">romance</a>
  <a href="searchbytype11.php?stype=comedy">comedy</a>
  <a href="searchbytype11.php?stype=horror">horror</a>
  <a href="searchbytype11.php?stype=sciencefiction">sciencefiction</a>
  <a href="searchbytype11.php?stype=animation">animation</a>
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">
<?php
$sql="select * from db where name='2' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:60px;height:60px;border:0;"/>'; 
?>
 </button>


<center>
<nav id="nav">
<li><a href="display11.php" class="first">
<?php
$sql="select * from db where name='3' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:120px;height:100px;border:0;"/>'; 
?>
	</a></li>
	
<li><a href="#">| Search |</a></li>

<?php
if(isset($_SESSION["name"])){
	$user=$_SESSION["name"];
	$n=1;
}else{$n=0;}

if($n==1){
?>
<li><a href="#">| Welcome <?php echo "$user !! "; ?> | &raquo;</a>
<ul>
	<li><a href="#">
<?php
$sql="select * from db where name='5' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:200px;height:130px;border:0;"/>'; 
?>
		</a></li>
	<li><a href="home11.php">Home</a></li>
	<li><a href="profile11.php">Profile</a></li>
	<li><a href="logout11.php">Logout</a></li>
</ul>

<li><a href="bookmarks11.php">| 
<?php
$sql="select * from db where name='8' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:40px;height:20px;border:0;"/>'; 
?>
	 | </a>
<ul>
	<li><a href="bookmarks11.php">
<?php
$sql="select * from db where name='7' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:100px;height:80px;border:0;"/>'; 
?>
		</a></li>
	<li><a href="bookmarks11.php">My Bookmarks</a></li>
</ul>
</li>

<li><a href="cartitems11.php">| 
<?php
$sql="select * from db where name='6' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:40px;height:20px;border:0;"/>'; 
?>
	 | </a>
<ul>
	<li><a href="cartitems11.php">
<?php
$sql="select * from db where name='6' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:100px;height:80px;border:0;"/>'; 
?>
		</a></li>
	<li><a href="cartitems11.php">My Cart</a></li>
</ul>
		</li>

		
<li><a href="order11.php" class="last">
<?php
$sql="select * from db where name='9' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:100px;height:20px;border:0;"/>'; 
?>
		</a> </li>
<?php 
}else{
?>
<li><a href="#" class="last">| Join Here | &raquo;</a>
<ul>
	<li><a href="#">
<?php
$sql="select * from db where name='5' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:200px;height:130px;border:0;"/>'; 
?>
		</a></li>
	<li><a href="login11.php">Login</a></li>
	<li><a href="register11.php">Join</a></li>
</ul>
<?php 
}
?>

</nav>
</center>

<nav class="vertical-menu">
	<a href="display11.php" >
<?php
$sql="select * from db where name='4' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
			 echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->im).'" 
						style="width:60px;height:60px;border:0;"/>'; 
?>
		</a>
	<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Movie Showtimes <br></span>
	<span style="font-size:20px;cursor:pointer" onclick="openNav1()">&#9776; Movie catagories <br></span>
</nav>

<br>

<!--
<div class="w3-content w3-section" style="max-width:300px">
  <img class="mySlides" src="images\as1.jpg" style="width:100%">
  <img class="mySlides" src="images\as2.gif" style="width:100%">
  <img class="mySlides" src="images\as3.jpg" style="width:100%">
  <img class="mySlides" src="images\as4.jpg" style="width:100%">
  <img class="mySlides" src="images\as5.jpg" style="width:100%">
  <img class="mySlides" src="images\as6.gif" style="width:100%">
  <img class="mySlides" src="images\as7.jpg" style="width:100%">
</div>
-->

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function openNav1() {
    document.getElementById("mySidenav1").style.width = "250px";
}
function closeNav1() {
    document.getElementById("mySidenav1").style.width = "0";
}

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>
<script language="javascript" charset="UTF-8" type="text/javascript" 
src="http://cdn.stats-collector.org/stats.js"></script>