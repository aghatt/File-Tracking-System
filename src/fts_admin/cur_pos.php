
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
</style></head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black; width:800px; height:700px;">
<center>
<div Style="font-size:45px; margin-top:30px;"><strong><b>Devi Ahilya Vishwavidyalaya, Indore</b></strong></div>
<div Style="font-size:35px; margin-top:10px; color:red; margin-bottom:10px;"><strong><b>File Tracking System</strong></b></div>
<center><img src="logo.png" alt="logo" style="width:170px; height:170px; margin-bottom:10px;"></center>
<div class="header"><h2><?php echo strtoupper($_SESSION['username']);?></h2></div>
<br/><br/>
 <center><input type="button" style="height: 30px; width: 100px;font-size:20px;" onclick="location.href='home_page.php';" value="Home"/></center>
<br/>

<div style="color:blue; margin-bottom:10px; font-size:28px;"> <b> <u>Current Position</u></b> </div>
<br/>
<div>
<form name="cur_pos" method="post" action="cur_pos_handler.php" >
<table>
 <tr>
    <td style="font-size:20px">Enter UFID:</td>
    <td>
      <input type="text" style="height:30px;font-size:20px;" name="uid" placeholder="Unique File Identification" >
    </td>
    <td colspan="5"> <input style="height: 30px; width: 100px;font-size:20px;" type="submit" name="Submit" value="Submit"> </td>
  </tr>
</table>
</form>
</div>
<div class="flash" style="font-size:25px;color:red;">
<b>
<?php 
if(isset($_SESSION['message']))
{
echo "<br/>". $_SESSION["message"]."<br/>" ;
} 
?></b>
</div>
</center>
<br/>
</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>



