<?php 	session_start();
		if(!isset($_SESSION['username'])){
		header("Location: index.php");
		}
?>
<?php 
include("functions.php");
$pre=$_SESSION['username'];
$r=generate($_SESSION['username']);
$uidfinal=strtoupper($pre).'/'.date('y').'/'.$r;
$s_date=date("Y-m-d");
$dt = explode('-',$s_date);
$s_date=$dt[2]."-".$dt[1]."-".$dt[0];
?>

<html>
<head>
<title>File Tracking System</title>
<script>
function generateUid(){	
		myelement=document.getElementById("uid");
		myelement.setAttribute('value','<?php echo $uidfinal ?>');
		myelement.setAttribute('readonly','readonly');
		<?php $origin=$_SESSION['username'];?>
}
</script>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
   
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
   <div class="header"><h3><?php echo strtoupper($_SESSION['name']);?></h3></div>
   <div style="color:blue; margin-bottom:20px; font-size:18px;"> <b>Send to RNT Sections</b> </div>

<form action="send_handler.php?origin=<?php echo $origin ?>&rem=<?php echo $r ?>" method="post">
<table border="5" cellspacing="10" cellpadding="15" >
          
  <tbody>
  <tr>
   <th>*Unique File Identification</th>
    <th>UFID*</th>
    <th>DESTINATION</th>
    <th>DATE</th>
    <th></th>
  </tr>
  <tr>
	<td style="text-align:center;weight:bold;">
    <input class="button" type="button" name="g_uid" onclick="return generateUid();" value="NEW UFID*">
    </td>
    <td> <input type="text"  id="uid" name="uid" placeholder="CODE / YY / SERIAL NO" required> </td>
				
<td>
<select  required name="dst">
<option value=""> ------Select Department------</option>
<option value="vcoffice"> VC Office</option>
<option value="Regis">Registrar</option>
<option value="Conf">Confidential</option>
<option value="Develop">Development</option>
<option value="Exam">Examination</option>
<option value="Store">Store</option>
<option value="Estab">Establishment</option>
<option value="Acad">Academic</option>
<option value="Acco">Accounts</option>
<option value="Audit">Audit</option>
<option value="SCST">SC/ ST</option>
<option value="Engg">Engineering</option>
<option value="DCDC">DCDC</option></option>
<option value="DSW">DSW</option>
<option value="NSS">NSS</option>
<option value="Adminis">Administration</option>
<option value="ppress">Printing Press</option>
<option value="examcon">Exam Controller</option>
<option value="shlib">Student Home Library</option>
<option value="accountsf">Accounts(Self Finance)</option>
<option value="uls">University Legal Section</option>
<option value="bcsd">Bahai Chair for Studies in Development</option>
<option value="centiwow">Central Inward Outward Section</option>
</select>  
</td>
    <td>
	<table>
			<tr>	
			<!--	<td>
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
				
					
				<td>
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
				
				<td>
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
					</select> -->
				</td>
				<td> 
					<input type="text"  id="uid" name="s_date" readonly placeholder="" value="<?php echo $s_date;?>" required>
				</td>
			</tr>
		</table>
      </td>
    <td> <input type="submit"  name="submit" value="Submit">  </td>
  </tr>
  </tbody>
  </table>
  </form>
  
  </div>
  <br/>
<p style="color:red;">* Unique File Identification</p>
</center>

</body>
<?php 
unset($_SESSION["message_s"]);
?>
</html>