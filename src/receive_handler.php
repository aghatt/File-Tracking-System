<?php
session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");
		}
include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);
$session=$_SESSION['username'];
$tablename_r="receive_".$session;
//$sql = "SELECT uid, src FROM receive_inst";
//$result = mysqli_query($conn, $sql);
$uid=$_POST['uid'];
$src=$_POST['src'];
$r_fno="";
$r_date=$_POST['yyyy']."-".$_POST['mm']."-".$_POST['dd'];
//insertion into recieve table
$query="UPDATE  $tablename_r SET fileno='$r_fno', date='$r_date' WHERE uid='$uid' ";
$result=mysqli_query($connection,$query);
//jain updates
$query1="UPDATE master_table_log SET r_date='$r_date',flag=1 WHERE uid='$uid' and r_date IS NOT null and src='$src' and dst='$session'"; 
$result1=mysqli_query($connection,$query1);
//

if($result)
{  echo "data updated into receive table";   }
else
{	die("error:Data cannot be updated into recieve table");  }
//insertion into master table
$query="UPDATE master_table SET r_date='$r_date',flag=1 WHERE uid='$uid' "; 
echo $query;
$result=mysqli_query($connection,$query);
if($result)
{  echo "data updated into maste table";   }
else
{	die("error:Data cannot be updated into master table");  }
header('Location: receive.php');
?>