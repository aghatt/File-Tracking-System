<?php
	session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");
		}
include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);
$sender=strtolower($_SESSION['username']);
$message="";
if(isset($_GET['origin'])){
	$origin=$_GET['origin'];
}else{
	$origin="";
}
$uid=$_POST['uid'];

//echo "<script>alert('test2')</script>";
if(isset($_GET['rem'])){
	$saveuid=$_GET['rem'];
	$var=strtolower($_SESSION['username']);
	$query2="update gen_{$var} set uid={$saveuid}";
		$result2 = mysqli_query($connection,$query2);
		if(!$result2){
			echo"<script>alert('error in saving generated Uid. error#2');
			  window.location='send.php';</script>";
						}
}

$tablename_s="send_".$sender;

$dst=$_POST['dst'];
$s_fno="";

$s_date=$_POST['s_date'];
$dt = explode('-',$s_date);
$s_date=$dt[2]."-".$dt[1]."-".$dt[0];
$tablename_r=strtolower("receive_".$dst);
//inserting into send table
//echo "<script>alert('test1')</script>";
//$test1="select * from receive_{$sender} where  uid='{$uid}' and date=''";
//$resulttest=mysqli_query($connection,$test1);
//$numm= mysqli_num_rows($resulttest);

//if($numm>0){
	//echo "<script>alert('Please first receive the file!');window.location='receive.php'</script>";
//}

$query="INSERT INTO $tablename_s VALUES ('$uid','$dst','$s_fno','$s_date')";
$result=mysqli_query($connection,$query);
if(!$result)
	die("error:Data cannot be inserted into send");  
//inserting into receive table
//$query="INSERT INTO receive_ietdavv VALUES ('$uid','$sender','','')";
$query="INSERT INTO $tablename_r  VALUES('$uid','$sender','','')";
$result=mysqli_query($connection,$query);
if(!$result)  
	die("error:Data cannot be inserted into receive");  

//inserting into master table
$query1= "select uid from master_table where uid='{$uid}'";
$result1=mysqli_query($connection,$query1);
$number_of_rows= mysqli_num_rows($result1);
if($number_of_rows>0){
	$query="UPDATE master_table SET src='$sender',dst='$dst',s_date='$s_date',r_date='',flag=2 WHERE uid='$uid' "; 
	
	//jAIN    TRACK HISTORY

		$query1 = "Insert into master_table_log (uid,src,dst,s_date,r_date,flag) VALUES('$uid','$sender','$dst','$s_date','',2)";
$result1=mysqli_query($connection,$query1);


// JAIN        TRACK HISTORY

	
$result=mysqli_query($connection,$query);
if($result)
	   $message.= "Sent & Saved";   
else
	die("error:Data cannot be inserted into MT");  

}else{
	$query="INSERT INTO master_table (uid,src,dst,s_date,r_date,flag) VALUES('$uid','$sender','$dst','$s_date','',2)";
	
	//jAIN    TRACK HISTORY

	
	$query1 = "Insert into master_table_log (uid,src,dst,s_date,r_date,flag) VALUES('$uid','$sender','$dst','$s_date','',2)";
$result1=mysqli_query($connection,$query1);


// JAIN        TRACK HISTORY
	
$result=mysqli_query($connection,$query);
if($result)
     $message.= "Sent & Saved";   
else
	die("error:Data cannot be inserted into mt"); 
}
 /*if($origin=="")
 { 	$query="UPDATE master_table SET src='$sender',dst='$dst',s_date='$s_date',r_date='',flag=2 WHERE uid='$uid' "; 
$result=mysqli_query($connection,$query);
if(!$result){die("error:Data cannot be inserted into MT");}	     
	  

}       
else {$query="INSERT INTO master_table (uid,src,dst,s_date,r_date,flag) VALUES('$uid','$sender','$dst','$s_date','',2)";
$result=mysqli_query($connection,$query);
if(!$result){die("error:Data cannot be inserted into mt"); }
	
}           
*/
$_SESSION["message_s"]=$message;
mysqli_close($connection);
header('Location: send.php');

?>