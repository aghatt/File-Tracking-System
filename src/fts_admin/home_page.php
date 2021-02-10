<?php session_start();
    if(!isset($_SESSION['username'])){
    header("Location: login_admin.php");
    } ?>
<html>
<head>
<title>File Tracking System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black; width:800px; height:650px;">
   
   
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:170px; height:170px; margin-bottom:50px;">
   <div class="header"><h2>Welcome to Admin Module</h2></div>

<input  type="button" onclick="location.href='track_admin.php';" value="Track"/>
<input  type="button" onclick="location.href='viewall.php';" value="View All"/>
<input  type="button" onclick="location.href='logout.php';" value="Logout"/>

</div>
</center>
</body>
</html>