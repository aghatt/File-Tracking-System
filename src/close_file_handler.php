<?php
	session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");
		}
include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);
$uid=$_POST['uid1'].'/'.$_POST['uid2'].'/'.$_POST['uid3'];
echo $uid; 
$query1="UPDATE master_table set status=2 where uid='$uid'";
$result1=mysqli_query($connection,$query1);



$out1 = mysqli_affected_rows($connection);
$query2="UPDATE master_table_log set status=2 where uid='$uid'";
$result2=mysqli_query($connection,$query2);



$out2 = mysqli_affected_rows($connection);




if(($out1==0)&&($out2==0)){
	$_SESSION['message']='Invalid UFID';
	header('Location: close_file.php');
}else{
	$_SESSION['message']='File Closed';
	header('Location: close_file.php');
}


?>