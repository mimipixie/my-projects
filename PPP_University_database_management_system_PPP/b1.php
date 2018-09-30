<?php
$n=0;
if(isset($_SESSION["username"])){
	$user=$_SESSION["username"];
	$type=$_SESSION["usertype"];
	if($type=="admin"){
		$n=1;
	}else if($type=="faculty"){
		$n=2;
	}else{
		$n=3;
	}
}
$y=date("Y");
$m=date("m");
if($m=="01" || $m=="02" || $m=="03" || $m=="04"){
	$s="Spring";
}else if($m=="09" || $m=="10" || $m=="11" || $m=="12"){
	$s="Fall";
}else{
	$s="Summer";
}	

?>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<?php
if($n!=0){
?>
<?php
if($n==1){
?>
  <a href="#"> | Applications admin | </a>
<!--
  <a href="approveAdmin1.php"> | approve admin | </a>
-->
  <a href="addlistFac1.php"> | add faculty | </a>
  <a href="addlistStd1.php"> | add student | </a>
  <a href="room2.php"> | add room | </a>
  <a href="slot2.php"> | add slot | </a>
  <a href="addCrs1.php"> | add course | </a>
  <a href="offerSec1.php"> | offer section | </a>
  <a href="addDep1.php"> | add dept | </a>
  <a href="offerCrs1.php"> | offer course | </a>
  <a href="lib22.php"> | library management | </a>
<?php 
}else if($n==2){
?>
  <a href="#"> | Applications faculty | </a>
  <a href="regFac1.php"> | faculty course reg | </a>
  <a href="crsFac1.php"> | courses taken | </a>
  <a href="grade3.php"> | grade submission | </a>
<?php 
}else if($n==3){
?>
  <a href="#"> | Applications student | </a>
  <a href="regStd1.php"> | student course reg | </a>
  <a href="crsStd1.php"> | courses taken | </a>
  <a href="lib2.php"> | library management | </a>
<?php 
}


}else{
?>
  <a href="#"> | Applications for all | </a>
<?php 
}
?>
</div>
<!--
<div id="mySidenav1" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
  <a href="searchbytype11.php?stype=shirt">Shirt</a>
  <a href="searchbytype11.php?stype=tshirt">T-shirt</a>
  <a href="searchbytype11.php?stype=top">Top</a>
  <a href="searchbytype11.php?stype=trousers">Trousers</a>
  <a href="searchbytype11.php?stype=jeans">Jeans</a>
  <a href="searchbytype11.php?stype=flat">Flat Sandle</a>
  <a href="searchbytype11.php?stype=wedge">Wedges</a>
  <a href="searchbytype11.php?stype=heel">Heels</a>
  <a href="searchbytype11.php?stype=boot">Boots</a>
  <a href="searchbytype11.php?stype=wristwatch">Wristwatches</a>
  <a href="searchbytype11.php?stype=sunglasses">Sunglasses</a>
  <a href="searchbytype11.php?stype=glasses">Glasses</a>
  <a href="searchbytype11.php?stype=handbag">Hand bags</a>
  <a href="searchbytype11.php?stype=bag">Bags</a>
</div>
-->
<button onclick="topFunction()" id="myBtn" title="Go to top">
	<img src="images\top.jpg" alt="TOP" style="width:60px;height:60px;border:0;"> </button>


<center>
<nav id="nav">
<li><a href="home1.php" class="first">
		<img src="images\11.jpg" alt="HOME" style="width:120px;height:100px;border:0;">
	</a></li>
<?php
if($n!=0){
?>
<li><a href="#">| Welcome <?php echo "$user !! "; ?> | &raquo; | </a>
<ul>
	<li><a href="#">
			<img src="images\admin.jpg" alt="user" style="width:200px;height:130px;border:0;">
		</a></li>
	<li><a href="home1.php">Home</a></li>
	<li><a href="profile1.php">Profile</a></li>
	<li><a href="home11.php">Logout</a></li>
</ul>
</li>
<?php
if($n==1){
?>
<li><a href="#"> | Applications | </a>		</li>
<?php 
}else if($n==2){
?>
<li><a href="#"> | Applications | </a>		</li>
<?php 
}else if($n==3){
?>
<li><a href="#"> | Applications | </a>		</li>
<?php 
}


}else{
?>
<li><a href="#">| Welcome ! | &raquo; | </a>
<ul>
	<li><a href="#">
			<img src="images\emp.jpg" alt="user" style="width:200px;height:130px;border:0;">
		</a></li>
	<li><a href="home11.php">Login | Join </a></li>
</ul>
</li>
<li><a href="#"> | Applications for all | </a>		</li>
<?php 
}
?>
<li><a href="#"> | <?php echo "$s$y";?> | </a>		</li>





</center>

<nav class="vertical-menu">
	<a href="home1.php" >
		<img src="images\home.jpg" alt="HOME" style="width:60px;height:60px;border:0;"></a>
	<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; OPEN <br></span>
<!--
	<span style="font-size:20px;cursor:pointer" onclick="openNav1()">&#9776; Search by catagory <br></span>
-->
	</nav>

<br>

<div class="w3-content w3-section" style="max-width:300px">
  <img class="mySlides" src="images\1.jpg" style="width:100%">
  <img class="mySlides" src="images\2.jpg" style="width:100%">
  <img class="mySlides" src="images\3.jpg" style="width:100%">
  <img class="mySlides" src="images\4.jpg" style="width:100%">
</div>

<div class="d1">
	<img src="images\img.png" alt="im" style="width:200px;height:20px;border:0;">
</div>


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
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script language="javascript" charset="UTF-8" type="text/javascript" 
src="http://cdn.stats-collector.org/stats.js"></script>

