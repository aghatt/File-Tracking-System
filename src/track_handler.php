<?php
session_start();
        if(!isset($_SESSION['username'])){
        header("Location: index.php");
        }

		if(isset($_POST['detailed'])){
			$uid=$_POST['uid'];
			$_SESSION['duid']=$uid;
			header('Location: trackreport.php');
		}else if(isset($_POST['current'])){
			$uid=$_POST['uid'];
	if(!empty($uid))
	{
	
    include("serverconfig.php");
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    $sender=$_SESSION['username'];
	$query="SELECT uid,src,dst,r_date,s_date,flag,status FROM master_table WHERE uid='$uid'";
	$result=mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $message="";
	



    $dt1 = explode('-',$row['s_date']);
	$dt2=explode('-',$row['r_date']);
    if($row['flag']==2)//0
	{$message.= "Departed from ".strtoupper($row['src'])." for ".strtoupper($row['dst'])." on date ".$dt1[2]."-".$dt1[1]."-".$dt1[0];
	$status=$row['status'];
	if($status==1){
		$_SESSION['status']="Active";
	}else{
		$_SESSION['status']="Closed";
	}
	}
    else if($row['flag']==1)
	{$message.= "Received by ".strtoupper($row['dst'])." from ".strtoupper($row['src'])." on date ".$dt2[2]."-".$dt2[1]."-".$dt2[0];
	$status=$row['status'];
	if($status==1){
		$_SESSION['status']="Active";
	}else{
		$_SESSION['status']="Closed";
	}
	}
    else
    	$message.= "Enter valid UFID";
    }
    else
    	$message.= "Enter UFID";
    $_SESSION["message"]=$message;
mysqli_close($connection);
header('Location: trackcurrent.php');
		}else{
			echo 'There was an error while connecting, try again later!';
		}
		
		
		
		
	
?>