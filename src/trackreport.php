<?php
session_start();
        if(!isset($_SESSION['username'])){
        header("Location: index.php");
        }
if(!(isset($_SESSION['duid']))){
	 header("Location: track.php");
}
    $uid=$_SESSION['duid'];
	unset($_SESSION['duid']);
    include("serverconfig.php");
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    $sender=$_SESSION['username'];
    $query="SELECT * FROM master_table_log WHERE uid='$uid'";
    $result=mysqli_query($connection,$query);
    $msg='';

$number_of_rows = mysqli_num_rows($result);
$i = $number_of_rows;
$status='';    
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
<div >
   
  
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>
   <div style="color:blue; margin-bottom:10px; font-size:20px;"> <b>Detailed Track Report</b> </div>
   <div style="color:black; margin-bottom:10px; font-size:18px;"> <b> <?php echo strtoupper($uid); ?> </b> </div>


   <table border="5" cellspacing="10" cellpadding="15" >
            <tr>
            <th colspan="3" >SOURCE</th>
            <th colspan="3" >DESTINATION</th>
            </tr>
            <tr>
                <th colspan="2" >SOURCE</th>
                <th >SENT DATE</th>
                <th colspan="2" >DESTINATION</th>
                <th >RECEIVED DATE</th>
               
            </tr>
    
<!-------------PHP LOOP------------ -->
<?php
                $j=0;
                for($j=0;$j<$i;$j++){
                    
                    $row = $temp_array[$j];
                    $uid=$row["uid"];
                    $src = $row["src"];
                    $dst = $row["dst"];
                    $s_date = $row['s_date'];   
                    $r_date = $row['r_date'];   
					$dt1 = explode('-',$row['s_date']);
					$dt2=explode('-',$row['r_date']);
                    $flag = $row['flag']; 
					$status=$row['status'];
					
            ?>

<tr>
  <td colspan="2" style="height: 120%; font-size:20px;">
   <?php echo strtoupper($src);?>
    </td>
    
    <td style="height: 120%; font-size:20px;">
     <?php echo $dt1[2]."-".$dt1[1]."-".$dt1[0];?>
    </td>
    <td colspan="2" style="height: 120%; font-size:20px;">
       <?php echo strtoupper($dst);?>
    </td>
    <td style="height: 120%; font-size:20px;">
      <?php if($r_date==''){
          echo "Not Received";
      }else{
          echo $dt2[2]."-".$dt2[1]."-".$dt2[0];
      }?>
    </td >
 </tr>
  <!-------------- php while loop--- -->
 
  <?php
  }
    ?>
	<tr>
	<td colspan="7" style="text-align:center;font-size:20px">
	<?php 
 if($status==1){
		echo "<span style='color:green'>";
		echo "Status: Active";
		echo "</span>";
	
}else if($status==2){
	echo "<span style='color:red'>";
	echo "Status: Closed" ;
	echo "</span>";
	
}
//echo "Status: ". $_SESSION["status"] ;  ?>
	</td>
	</tr>
<tr>
<td colspan="7" style="text-align:center;font-size:20px">
<span style="color:red;"><b>
<?php echo $msg."<br/>";?></b></span>
</td></tr>
</table>




<div style="padding-top:10px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</div>

</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>



