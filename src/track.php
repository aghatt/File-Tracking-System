<?php session_start();
    if(!isset($_SESSION['username'])){
    header("Location: index.php");
    } ?>
<html>
<head>
<title>File Tracking System</title>

</head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black; width:800px; height:700px;">
   
  
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>
   <div style="color:blue; margin-bottom:20px; font-size:18px;"> <b> Track File</b> </div>


<div>
<form name="track" method="post" action="track_handler.php" >
<table>
 <tr>
    <td >Enter UFID:</td>
    <td>
      <input type="text"  name="uid" placeholder="CODE / YY / SERIAL NO" >
    </td>
  </tr>
</table><br />
<center>
<input type="submit" name="current" value="Current Status"/>&nbsp;&nbsp;
<input type="submit" name="detailed" value="Detailed Track Report"/>
</center>

</form>


<p style="color:red;">* Unique File Identification</p>


</div>


<div style="align:right;padding-top:50px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size:18px; float: right;margin-right:20px;margin-top:70px;"><< <b>Back to Home</b></a>
</div>

</div>

</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>



