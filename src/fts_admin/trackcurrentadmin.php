<?php session_start();
    if(!isset($_SESSION['username'])){
    header("Location: index.php");
    } ?>
<!-- saved from url=(0032)http://localhost/fts/receive.php -->

<html>
<head>
<title>File Tracking System</title>
<style>
.flash {
   animation-name: flash;
    animation-duration: 0.2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-play-state: running;
}

@keyframes flash {
    from {color: red;}
    to {color: black;}
}
</style>
</head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black; width:800px; height:650px;">
   
  
  <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
  <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
  <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
  <div class="header"><h3>Admin Module</h3></div>
  <div style="color:blue; margin-bottom:10px; font-size:20px;"> <b>Current Location</b> </div>



<div class="flash" style="font-size:25px;color:red;height:170px;">
<b>
<?php 
if(isset($_SESSION['message']))
{
echo "<br/>". $_SESSION["message"]."<br/>" ;
} 
?>
</b>
<?php if(isset($_SESSION['status']))
{ if($_SESSION['status']=="Active"){
	echo '<p style="font-size:25px;color:Green;height:170px;">';
	echo "Status: ". $_SESSION["status"] ;
	echo '</p>';
}else{
	echo '<p style="font-size:25px;color:red;height:170px;">';
	echo "Status: ". $_SESSION["status"] ;
	echo '</p>';
}
//echo "Status: ". $_SESSION["status"] ;
}  ?>
</div>

<div style="padding-top:60px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</div>

</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
unset($_SESSION["status"]);
?>
</html>


