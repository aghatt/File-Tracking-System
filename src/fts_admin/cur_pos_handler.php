<?php
session_start();
        if(!isset($_SESSION['username'])){
        header("Location: index.php");
        }

	$uid=$_POST['uid'];
	if(!empty($uid))
	{
	
    include("serverconfig.php");
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    $sender=$_SESSION['username'];
	$query="SELECT uid,src,dst,r_date,s_date,flag FROM master_table WHERE uid='$uid'";
	$result=mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $message="";
    if($row['flag']==2)//0
     	$message.= "Departed from ".strtoupper($row['src'])." for ".strtoupper($row['dst'])." on date ".$row['s_date'];
    else if($row['flag']==1)
    	$message.= "Received by ".strtoupper($row['dst'])." from ".strtoupper($row['src'])." on date ".$row['r_date'];
    else
    	$message.= "Enter valid UID";
    }
    else
    	$message.= "Enter UID";
    $_SESSION["message"]=$message;
mysqli_close($connection);
header('Location: track.php');
?>