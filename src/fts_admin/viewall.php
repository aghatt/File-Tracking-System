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
  <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
  <div class="header"><h3>Admin Module</h3></div>
  <div style="color:blue; margin-bottom:20px; font-size:20px;"> <b> View All Files</b> </div>

  <input type="button" onclick="location.href='viewall_r.php';" value="Received Files"/>
  <input type="button" onclick="location.href='viewall_s.php';" value="Sent Files"/>

  
<div style="padding-top:120px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size:18px; float: right;margin-right:20px;margin-top:70px;"><< <b>Back to Home</b></a>
</div>

</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>



