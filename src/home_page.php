<?php 	session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");   }
?>
<html>
<head>
<title>File Tracking System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black; width:800px; height:650px;">
   
   
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:50px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>


<input style="margin-right: 20px;" type="button" onclick="location.href='receive.php';" value="Receive"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='send.php';" value="Send"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='close_file.php';" value="Close File"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='track.php';" value="Track"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='viewall.php';" value="View All"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='logout.php';" value="Logout"/>


</div>
</center>
</body>
</html>