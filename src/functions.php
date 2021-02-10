
<?php 
	
	
function generate($var){
$var=strtolower($var);
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno()){
	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
	
	$query1="select uid from gen_{$var}";
	$result1 = mysqli_query($connection,$query1);
	$number_of_rows1 = mysqli_num_rows($result1);
	if($number_of_rows1>0){	
		$row = mysqli_fetch_assoc($result1);
		$newvar=$row['uid'];
		$newvar=$newvar +1;
		/*$query2="update gen_{$var} set uid={$newvar}";
		$result2 = mysqli_query($connection,$query2);
		if(!$result2){
			echo"<script>alert('error in generating Uid. error#2');
			  window.location='send.php';</script>";
		}*/
	}else{
		echo"<script>alert('error in generating Uid. error#1');
			  window.location='send.php';</script>";
	}
	
	return $newvar;
}
?>