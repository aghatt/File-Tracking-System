<?php 
//error_reporting(E_ERROR | E_PARSE | E_NOTICE);
if(isset($_POST["submit"])){
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	
	if(mysqli_connect_errno()){
	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
	if(isset($_POST["username"])){
		$username=$_POST["username"];
	}else{
		$username="";
	}
	if(isset($_POST["password"])){
		$password=$_POST["password"];
	}else{
		$password="";
	}

	$query="select * from Superusers where username='$username' and password='$password'";
	$result = mysqli_query($connection,$query);
	$number_of_rows = mysqli_num_rows($result);
	if($number_of_rows>0){
		session_start();
		$_SESSION['username']=strtolower($username);
		echo"<script>alert('success');";
		header("Location: home_page.php");
		
	}else{ session_start();
			
		echo"<script>alert('Wrong username/password combination');
					 window.location='login_admin.php';</script>";
	}
	
}else{
	die('sorry, there was a problem connecting to database, Pleasse try again!');
}

?>
