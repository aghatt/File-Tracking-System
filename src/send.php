<?php 	session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");
		}
?>
<html>
<head>
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
<title>File Tracking System</title>

</head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black;width: 800px;height: 650px;">
     
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:10px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>
   <div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;padding-bottom: 10px;"> <b> Sending File Module</b> </div>

  <input type="button"  onclick="location.href='send1.php';" value="UTDs"/>
  &nbsp;&nbsp;&nbsp; 
  <input type="button" onclick="location.href='send2.php';" value="RNT Sections"/>

<div class="flash" style="font-size:20px;padding-top:20px;height:170px;">
<b>
<?php 
if(isset($_SESSION['message_s']))
{
echo  $_SESSION["message_s"] ;
} 
?></b>
</div>

<div style="align:right;padding-top:10px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</div>
</div>
</center>
</body>
</body>
<?php 
unset($_SESSION["message_s"]);
?>
</html>