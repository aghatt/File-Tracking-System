<?php
session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");
		}
		
include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_errno()){
die("Connection to Database failed: " .mysqli_connect_error()." (".mysqli_connect_errno().")");}

$session=strtolower($_SESSION['username']);
$tablename_r="receive_".$session;

$from_date=$_POST['yyyy1']."-".$_POST['mm1']."-".$_POST['dd1'];
$to_date=$_POST['yyyy2']."-".$_POST['mm2']."-".$_POST['dd2'];

$msg='';			  
$query="select * from $tablename_r where date BETWEEN '$from_date' and '$to_date' order by date";
$result = mysqli_query($connection,$query);
$number_of_rows = mysqli_num_rows($result);
$i=$number_of_rows;
if($number_of_rows >0){
	
				
		while($row = mysqli_fetch_array($result)){
		
		$temp_array[]=$row;
	
		}
}else{
	$msg="No files found!";
}
?>


<html>
<head>
<title>File Tracking System</title>
<style>
tr:nth-child(even){
		background-color: #ede8dd;
}
</style>
</head>
<body style="background-color:#ffff99;">
<center>
<div>  
  
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:10px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>
   <div style="color:blue; margin-bottom:10px; font-size:20px;"> <b>Received Files</b> </div>

<table border="5" cellspacing="10" cellpadding="15" >
   <tr>
    <th>UFID*</th>
    <th colspan="2">SOURCE</th>
    <th>DATE</th>
     <th>STATUS</th>
  </tr>

    <!-------------- php while loop--- -->
	<?php 
	$j=0;
				for($j=0;$j<$i;$j++){
					
					$row = $temp_array[$j];
					$uid = $row['uid'];

					$sender = $row["sender"];
					$fileno = $row["fileno"];
					$date = $row['date'];	
					$dt = explode('-',$row['date']);
					
	?>
	

	
  <tr>
    <td>
      <?php echo $uid;?>
    </td>
	<td colspan="2">
	<?php echo strtoupper($sender);?>
    </td>
    <td>
      <?php echo $dt[2]."-".$dt[1]."-".$dt[0];?>
    </td>
    <td> <?php 
		$query9="select status from master_table where uid='$uid'";
		$result9=mysqli_query($connection,$query9);
		$row9=mysqli_fetch_assoc($result9);
		$status=$row9['status'];
    	if($status==1){
		echo "<span style='color:green'>";
		echo "Active";
		echo "</span>";
	
}else if($status==2){
	echo "<span style='color:red'>";
	echo "Closed" ;
	echo "</span>";
	
} ?>
    </td>
  </tr>
  <!-------------- php while loop--- -->
  
  <?php
	}
  ?>

<tr>
<td colspan="5" style="text-align:center;">
<span style="color:red;"><b>
<?php echo $msg."<br/>";?></b></span>
<a href="viewall_r.php">Click to search again.</a><br/>
<span>*Unique File Identification</span>
</td>
</tr>
</table>


<div style="align:right;padding-top:10px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size:20px; float: right;margin-right:18px;"><< <b>Back to Home</b></a>
</div>

</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>






