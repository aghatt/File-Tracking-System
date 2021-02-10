<?php
	session_start();
		if(!isset($_SESSION['username'])){
		header("Location: login_admin.php");
		}
include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);
$from_date=$_POST['yyyy1']."-".$_POST['mm1']."-".$_POST['dd1'];
$to_date=$_POST['yyyy2']."-".$_POST['mm2']."-".$_POST['dd2'];
$query="select * from master_table_log where s_date BETWEEN '$from_date' and '$to_date' order by s_date";

if(($_POST['dpt']!='')&&($_POST['uid']=='')){
	$src=$_POST['dpt'];
	$query="select * from master_table_log where src='$src' and s_date BETWEEN '$from_date' and '$to_date' order by s_date";
}
if(($_POST['dpt']=='')&&($_POST['uid']!='')){
	$uid=$_POST['uid'];
	$query="select * from master_table_log where uid='$uid' and s_date BETWEEN '$from_date' and '$to_date' order by s_date";
}
if(($_POST['uid']!='')&&($_POST['src']!='')){
	$uid=$_POST['uid'];
	$src=$_POST['dpt'];
	$query="select * from master_table_log where uid='$uid' and src='$src' and s_date BETWEEN '$from_date' and '$to_date' order by s_date";}
$result = mysqli_query($connection,$query);

$number_of_rows = mysqli_num_rows($result);
$i = $number_of_rows;
$msg='';	
//$temp_array = array();

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
  <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
  <div class="header"><h3>Admin Module</h3></div>
 <div style="color:blue; margin-bottom:10px; font-size:20px;"> <b>Sent Files</b> </div>

<table border="5" cellspacing="10" cellpadding="10" >
   <tr>
   <!-- <th style=" font-size:20px;">FROM DATE</th>
    <th style=" font-size:20px;" >TO DATE</th> -->
    <th>UFID*</th>
    <th colspan="2" >SOURCE</th>
    <th colspan="2" >DESTINATION</th>
	<th>SEND DATE</th>
	<th>STATUS</th>
   </tr>
<!-------------PHP LOOP------------ -->	
<?php 
	$j=0;
				for($j=0;$j<$i;$j++){
					
					$row = $temp_array[$j];
					$ufid = $row['uid'];
					$src = $row['src'];	
					$dst = $row['dst'];
					$send_date=$row['s_date'];
					$dt = explode('-',$row['s_date']);
	?>
  <tr>
  <!--
    <td style="height: 120%; font-size:20px;">
    <?php echo strtoupper($from_date);?>
    </td>
    <td style="height: 120%; font-size:20px;">
       <?php echo strtoupper($to_date);?>
    </td >  -->
    <td>
        <?php echo strtoupper($ufid);?>
    </td>
    <td colspan="2" >
	  <?php echo strtoupper($src);?>
    </td>
    <td colspan="2" >
        <?php echo strtoupper($dst);?>
    </td>
   <td >
       <?php if($send_date==''){
			echo "Not Yet Received";
		}else{
			echo $dt[2]."-".$dt[1]."-".$dt[0];
		}
			?>
    </td>
    <td>
    	 <?php 
		$query9="select status from master_table where uid='$ufid'";
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
  <?php }		?>

<tr>
<td colspan="7" style="text-align:center;">
<span style="color:red;"><b>
<?php echo $msg."<br/>";?></b></span>
<a href="viewall_s.php">Click to search again.</a><br/>
<span>*Unique File Identification</span>
</td>
</tr>
</table>


<div style="padding-top:10px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size:18px; float:right;margin-right:20px;margin-top:80px;"><< <b>Back to Home</b></a>
</div>

</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>






