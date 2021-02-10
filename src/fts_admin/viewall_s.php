<?php session_start();
    if(!isset($_SESSION['username'])){
    header("Location: login_admin.php");
    } ?>
<html>
<head>
<title>File Tracking System</title>
<style>
tr:nth-child(even){
	background-color: #ede8dd;
}
</style>
<script type="text/javascript">
function validate(){
		var a1= document.getElementById("dd2").value;
		var b1= document.getElementById("mm2").value;
		var c1= document.getElementById("yyyy2").value;
		var e1date=new Date();
		e1date.setFullYear(c1); e1date.setMonth(b1-1,a1);
		var t2=e1date.getTime();
		
		var cdate= new Date();
		var t1=cdate.getTime();
		
		var a2= document.getElementById("dd1").value;
		var b2= document.getElementById("mm1").value;
		var c2= document.getElementById("yyyy1").value;
		var e2date=new Date();
		e2date.setFullYear(c2); e2date.setMonth(b2-1,a2);
		var t3=e2date.getTime();
		
		
		if(t2>t1){
			alert("Enter Valid To Date.");
			return false;
		}else if(t3>t1){
			alert("Enter Valid From Date.");
			return false;
		}
		else{
			return true;
		}
	
	}
</script>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
   
  
  <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
  <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>File Tracking System</b></div>
  <img src="logo.png" alt="logo" style="width:150px; height:150px; margin-bottom:20px;">
  <div class="header"><h3>Admin Module</h3></div>
 <div style="color:blue; margin-bottom:10px; font-size:20px;"> <b>Sent Files</b> </div>
<form action="viewall_s_report.php" method="post">
<table border="5" cellspacing="10" cellpadding="10" >
          
  <tbody>
  <tr>
  <th >FROM</th>
  <th >TO</th>
  <th >DEPARTMENT</th>
  <th >UFID</th>
   </tr>
    <tr>
    <td>
      <table>
			<tr>	
				<td>
					<select required id="dd1" name="dd1">
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
					<select required id="mm1" name="mm1">
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
					<select required id="yyyy1" name="yyyy1">
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
     <table>
			<tr>	
				<td>
					<select required id="dd2" name="dd2">
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
				
					
				<td>
					<select required id="mm2"  name="mm2">
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
					<select required id="yyyy2" name="yyyy2">
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
 <select  name="dpt">
<option value=""> ------(OPTIONAL)------</option>
<option value="Asc"> Human Resource Development Centre</option>
<option value="Biochem">School of Biochemistry</option>
<option value="Sobiotech">School of BioTechnology</option>
<option value="Chemsc">School of Chemical Sciences</option>
<option value="Socmrce">School of Commerce</option>
<option value="socsit">School of Computer Science & Information Technology</option>
<option value="Sodsf">School of Data Science & Forecasting</option>
<option value="Soecon">School of Economics</option>
<option value="Soedu">School of Education</option>
<option value="Soex">School of Electronics</option>
<option value="Sees">School of Energy & Environmental Studies</option>
<option value="Soinstru">School of Instrumentation</option>
<option value="Sjmc">School of Journalism & Mass Communication</option></option>
<option value="Solaw">School of Law</option>
<option value="Sols">School of Life Sciences</option>
<option value="Solang">School of Languages</option>
<option value="Somath">School of Mathematics</option>
<option value="Sopharma">School of Pharmacy</option>
<option value="Sopedu">School of Physical Education</option>
<option value="Sophy">School of Physics</option>
<option value="Sostat">School of Statistics</option>
<option value="Soss">School of Social Science</option>
<option value="Ietdavv">Institute of Engineering & Technology</option>
<option value="Imsdavv">Institute of Management Studies</option>
<option value="Iipsdavv">International Institute of Professional Studies</option>
<option value="Compcent">Computer Centre</option>
<option value="itc">Information Technology Centre</option>
<option value="Solib">School of Library and Information Science</option>
<option value="Cscdavv">Centre for Science  Communication</option>
<option value="Doll">Department of Life Long Learning</option>
<option value="Emrcdavv">Educational Multimedia Research Centre</option>
<option value="Umcdavv">University Minority Cell</option>
<option value="Ddedavv">Directorate of Distance Education</option>
<option value="Soyoga">School of Yoga</option>
<option value="Ccdavv">Community College</option>
<option value="Ddukkdavv">DDU-Kaushal Kendra</option>
<option value="ugh">University Guest House</option>
<option value="cno">Central Office</option>
<option value="crc">Central Review Centre</option>
<option value="uhc">University Health Center</option>
<option value="usv">University Shishu Vihar</option>
<option value="iqsc">Internal Quality Assurance Cell</option>
<option value="cpc">Central Placement Cell</option>
<option value="ucc">University Cultural Centre</option>
<option value="cvc">Central Valuation Center</option>
<option value="dos">Directorate of Sports</option>
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
<option value="examcon">Exam Controller</option>
<option value="shlib">Student Home Library</option>
<option value="accountsf">Accounts(Self Finance)</option>
<option value="uls">University Legal Section</option>
<option value="bcsd">Bahai Chair for Studies in Development</option>
<option value="centiwow">Central Inward Outward Section</option>

</select> 
</td>
<td>
<input type="text" name="uid" placeholder="(OPTIONAL)">
</td>
</tr>

<tr ><td colspan="6"><center><input type="submit" name="submit" onclick="return validate();" value="Submit"></center></td></tr>
 </tbody>
 </table>
 </form>

<div style="align:right;padding-top:20px;padding-bottom:0px;">
<a href="home_page.php" style="color:blue; text-decoration:none;font-size:18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</div>

</div>
</center>
</body>
<?php 
unset($_SESSION["message"]);
?>
</html>
