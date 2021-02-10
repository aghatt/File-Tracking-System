<?php session_start();
    if(!isset($_SESSION['username'])){
    header("Location: index.php");
    } ?>

<html>
<head>
<title>File Tracking System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
     
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:10px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>
   <div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;"> <b> Received Files</b> </div>

<table border="5" cellspacing="10" cellpadding="15" >
  <tbody>
  <tr>
    <th>UFID</th>
    <th>SOURCE</th>
    <th>DATE</th>
   </tr>

<?php
include("serverconfig.php");
$tname=strtolower($_SESSION['username']);
$connection = mysqli_connect($servername, $username, $password, $dbname);
//$sqlq = "SELECT uid, sender FROM receive_{$_SESSION['username']} where date=''";
$sqlq = "SELECT uid, sender FROM receive_{$tname} where date=''";
$result = mysqli_query($connection, $sqlq);
while($row = mysqli_fetch_assoc($result))
{  ?>
<form name="receive_inst" method="post" action="receive_handler.php" >
    <tr>
    <td>
      <input  type="text"  name="uid" value="<?php echo $row['uid'] ?>" readonly placeholder="Unique File Identification" required>
    </td>
    <td>
     <input  type="text" name="src"   value="<?php echo strtoupper($row['sender']); ?> " readonly required>
    </td>
    <td>
	<table>
			<tr >	
				<td >
					<select required name="dd">
						<option value="">dd</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
				</td>
				
					
				<td >
					<select required name="mm">
						<option value="">month</option>
						<option value="01">January</option>
						<option value="02">Februrary</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</td>
				
				
				<td >
					<select required name="yyyy">
						<option value="">year</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2030">2030</option>
						<option value="2031">2031</option>
						<option value="2032">2032</option>
						<option value="2033">2033</option>
						<option value="2034">2034</option>
						<option value="2035">2035</option>
						<option value="2036">2036</option>
						<option value="2037">2037</option>
					</select>
				</td>
			</tr>
		</table>
      </td>
    <td>
       <input type="submit" name="confirm" value="Confirm">
    </td>
  </tr>
  </form>
<?php
}
?>
  </tbody>
 </table>
 <div style="text-align: center;padding-top:10px;">*UFID : Unique File Indentification</div>
 
 
<div style="align:right;padding-top:50px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size:18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</div>
</div>


 </body>
</html>