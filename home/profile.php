<?php
   session_start();
?>
<?php
if($_SESSION['username']) {
}
else {
echo "<h1>Please login first .</h1>";
header("location: /online proctor/proctor_login.php");
}
?>





<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "proctordb";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
$un = $_SESSION['username'];
$sql = "select * from studentsdetails where `registernumber` like '$un'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
    $sname = $row['sname'];
    $dept = $row['dept']; 
    $doj = $row['doj'];
    $dob = $row['dob'];
    $pemail = $row['pemail'];
    $clgemail = $row['clgemail'];
    $smobile = $row['smobile'];
    $bloodgroup = $row['bloodgroup'];
    $fathername = $row['fathername'];
    $fatherprofession = $row['fatherprofession'];
    $fathermobile = $row['fathermobile'];
    $paddress = $row['paddress'];
    $gaddress = $row['gaddress'];
	$data = $row["dataconform"];
	$filename = $row["imagefilename"];
}}

if ($result === false) { die(mysqli_error($conn)); }

$conn->close();
?>






<html>
<head>
<title>ANITS :: Autonomous </title>
<link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/4/47/Anits_logo.jpg" type = "image/x-icon">
<style>
body {
    background: #D8B74D;
    background-image: initial;
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat-x: initial;
    background-repeat-y: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: rgb(216, 183, 77);
    line-height: 1em;
    margin: 0;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    padding: 0;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}
div{
    width: 1024px;
    margin:0 auto;
    background: white;
}
.div1{
    width: 1024px;
    margin: auto ;
    height: 30px;
    background: blue;
}
p{
color: white;
}
.w3-border-0{border:0.25!important}
.w3-input{
padding:8px;
display:block;
border:none;
border-bottom:1px solid #ccc;
width:70%
}
table {
border-collapse:collapse;
border-left-color:#0000CC;
border-left-style:ridge;
}
td {
font-family:"Times New Roman", Times, serif;
font-size:16px;
}
.fcbold{
font-weight:bold;
font-size:16px;
color:#0066CC;
}
th {
background-color: #CCCCCC;
color:#0000FF;
}
td img{
border:ridge;
}
.button {
    border: 0;
    text-align: center;
    display: inline-block;
    padding: 16px;
    margin: 15px;
    color: #FFFFFF;
    background-color: #E7E9ED;
    border-radius: 8px;
    font-family:"Trebuchet MS";
    font-weight: 600;
    text-decoration: none;
    transition: box-shadow 200ms ease-out;
}	
.button__greenlight {
    background-color: #06BB64;
}
.button__red {
    background-color: #FF6384;}
.hero-button-wrapper .button {
    width: 150px;
}
.hero-button-wrapper {
    padding: 20px 0;
}
* {
    box-sizing: border-box;
}
#indata{ display: none;}
#mviewdata{ display: none;}
#viewdata{ display: none;}
#editdata{ display: none;}
</style>
</head>
<body>
<div>

<div id="indata">

    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
<form action="sprofiledata_upload.php" enctype="multipart/form-data" method="post" >
    <table border="1" align="center"  cellspacing="2" cellpadding="8" width="70%">
	<tr>
	<th colspan="4"> STUDENT PROFILE </th>
	</tr>
	<tr>
	<td class="fcbold" width="30%">Student Name *</td> <td width="70%"> <input class="w3-input w3-border-0" type="text" name="sname" required> </td> <td rowspan="4">  <input type="file" name="fileimage" value=""/></td></tr>
	
	<tr>
	<td class="fcbold">Department *</td><td colspan="2"> 	
	<select name="dept" id="" required>
	<option value="cse">CSE</option>
	<option value="eee">EEE</option>
	<option value="ece">ECE</option>
	<option value="mech">MECH</option>
	<option value="it">IT</option>
	<option value="chem">CHEM</option>
	<option value="civil">CIVIL</option>
	</select></td>
	</tr>
	<tr>
	<td class="fcbold" > Date of Birth *</td> <td colspan="2"> <input type="date" name="dob" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Date of Joining </td> <td colspan="2"> <input type="date" name="doj" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Personal E-Mail *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="pemail" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" >College E-Mail </td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="clgemail" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" >Student Mobile Number *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="smobile" required> </td> 
	</tr>
	<tr>
	<td class="fcbold">Blood Group *</td><td colspan="2"> 	
	<select name="bloodgroup" id="" required>
	<option value="O+">O+</option>
	<option value="O-">O-</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	</select></td>
	</tr> 
	<tr>
	<td class="fcbold" > Father's Name *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="fathername" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Profession*</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="fatherprofession" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Mobile Number *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="fathermobile" required> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Permanent Address *</td> <td colspan="2"> <textarea name="paddress" cols="45" rows="5"></textarea> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Gurdian's Address </td> <td colspan="2"> <textarea name="gaddress" cols="45" rows="5"></textarea> </td> 
	</tr>
    </table>
<div class="content">
<div class="hero-button-wrapper" align="center">
	<button class="button button__greenlight" type="submit" name="submit" >upload</button>
</div></div>
</form>
<br></br>
</div>







<div id="viewdata">

    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
	<marquee behavior="scroll" direction="left" scrollamount="5">NOTE: Your data is verified! YOU Cannot any details now.</marquee>
	<br></br>
    <table border="1" align="center"  cellspacing="2" cellpadding="8" width="70%">
	<tr>
	<th colspan="4"> STUDENT PROFILE </th>
	</tr>
	<tr>
	<td class="fcbold" width="30%">Student Name</td> <td width="70%"> <?php echo $sname;?> </td> <td rowspan="4"> <img src="students_profile_pics/<?php echo $filename;?>" width="150" height="150" border="2" align="absmiddle"  /></td></tr>
	
	<tr>
	<td class="fcbold">Register Number </td><td colspan="2"> <?php echo $un;?> </td>
	</tr>
	<tr>
	<td class="fcbold">Department </td><td colspan="2"> <?php echo $dept;?> </td>
	</tr>
	<tr>
	<td class="fcbold" > Date of Birth </td> <td colspan="2"> <?php echo $dob;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Date of Joining </td> <td colspan="2"> <?php echo $doj;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Personal E-Mail </td> <td colspan="2"> <?php echo $pemail;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" >College E-Mail </td> <td colspan="2"> <?php echo $clgemail;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" >Student Mobile Number </td> <td colspan="2"> <?php echo $smobile;?> </td> 
	</tr>
	<tr>
	<td class="fcbold">Blood Group </td><td colspan="2"> <?php echo $bloodgroup;?> </td>
	</tr> 
	<tr>
	<td class="fcbold" > Father's Name </td> <td colspan="2"> <?php echo $fathername;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Profession</td> <td colspan="2"> <?php echo $fatherprofession;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Mobile Number </td> <td colspan="2"> <?php echo $fathermobile;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Permanent Address </td> <td colspan="2"> <?php echo $paddress;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Gurdian's Address </td> <td colspan="2"> <?php echo $gaddress;?> </td> 
	</tr>
    </table>
<br></br>
</div>







<div id="mviewdata">

    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>

	<marquee behavior="scroll" direction="left" scrollamount="5">NOTE: YOUR DATA IS SUBMITTED FOR VERIFICATION! IF YOU WISH TO CHANGE ANY DETAILS, CHANGE BEFORE IT GETS VERIFIED.</marquee>
	<br></br>

	<form action="sprofiledata_upload.php" method="post">
    <table border="1" align="center"  cellspacing="2" cellpadding="8" width="70%">
	<tr>
	<th colspan="4"> STUDENT PROFILE </th>
	</tr>
	<tr>
	<td class="fcbold" width="30%">Student Name</td> <td width="70%"> <?php echo $sname;?> </td> <td rowspan="4"> <img src="students_profile_pics/<?php echo $filename;?>" width="150" height="150" border="2" align="absmiddle"  /></td></tr>
	<tr>
	<td class="fcbold">Register Number </td><td colspan="2"> <?php echo $un;?> </td>
	</tr>
	<tr>
	<td class="fcbold">Department </td><td colspan="2"> <?php echo $dept;?> </td>
	</tr>
	<tr>
	<td class="fcbold" > Date of Birth </td> <td colspan="2"> <?php echo $dob;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Date of Joining </td> <td colspan="2"> <?php echo $doj;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Personal E-Mail </td> <td colspan="2"> <?php echo $pemail;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" >College E-Mail </td> <td colspan="2"> <?php echo $clgemail;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" >Student Mobile Number </td> <td colspan="2"> <?php echo $smobile;?> </td> 
	</tr>
	<tr>
	<td class="fcbold">Blood Group </td><td colspan="2"> <?php echo $bloodgroup;?> </td>
	</tr> 
	<tr>
	<td class="fcbold" > Father's Name </td> <td colspan="2"> <?php echo $fathername;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Profession</td> <td colspan="2"> <?php echo $fatherprofession;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Mobile Number </td> <td colspan="2"> <?php echo $fathermobile;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Permanent Address </td> <td colspan="2"> <?php echo $paddress;?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Gurdian's Address </td> <td colspan="2"> <?php echo $gaddress;?> </td> 
	</tr>
    </table>
	<div class="content">
<div class="hero-button-wrapper" align="center">
	<button class="button button__red" type="submit" name="edit" >EDIT DATA</button>
	</form>
</div></div>
<br></br>
</div>











<div id="editdata">

    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
<form action="sprofiledata_upload.php" enctype="multipart/form-data" method="post" >
    <table border="1" align="center"  cellspacing="2" cellpadding="8" width="70%">
	<tr>
	<th colspan="4"> STUDENT PROFILE </th>
	</tr>
	<tr>
	<td class="fcbold" width="30%">Student Name *</td> <td width="70%"> <input class="w3-input w3-border-0" type="text" name="sname" value="<?php echo $sname;?>"> </td> <td rowspan="4">  <input type="file" name="fileimage" value=""/></td></tr>
	
	<tr>
	<td class="fcbold">Department *</td><td colspan="2"> 	
	<select name="dept" >
	<option value="cse">CSE</option>
	<option value="eee">EEE</option>
	<option value="ece">ECE</option>
	<option value="mech">MECH</option>
	<option value="it">IT</option>
	<option value="chem">CHEM</option>
	<option value="civil">CIVIL</option>
	</select></td>
	</tr>
	<tr>
	<td class="fcbold" > Date of Birth *</td> <td colspan="2" > <input type="date" name="dob" value="<?php echo $dob;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Date of Joining </td> <td colspan="2"> <input type="date" name="doj" value="<?php echo $doj;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Personal E-Mail *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="pemail" value="<?php echo $pemail;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" >College E-Mail </td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="clgemail" value="<?php echo $clgemail;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" >Student Mobile Number *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="smobile" value="<?php echo $smobile;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold">Blood Group *</td><td colspan="2"> 	
	<select name="bloodgroup" >
	<option value="O+">O+</option>
	<option value="O-">O-</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	</select></td>
	</tr> 
	<tr>
	<td class="fcbold" > Father's Name *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="fathername" value="<?php echo $fathername;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Profession*</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="fatherprofession" value="<?php echo $fatherprofession;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Father's Mobile Number *</td> <td colspan="2"> <input class="w3-input w3-border-0" type="text" name="fathermobile" value="<?php echo $fathermobile;?>"> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Permanent Address *</td> <td colspan="2"> <textarea name="paddress" cols="45" rows="5" ><?php echo $paddress;?></textarea> </td> 
	</tr>
	<tr>
	<td class="fcbold" > Gurdian's Address </td> <td colspan="2"> <textarea name="gaddress" cols="45" rows="5" ><?php echo $gaddress;?></textarea> </td> 
	</tr>
    </table>
<div class="content">
<div class="hero-button-wrapper" align="center">
	<button class="button button__greenlight" type="submit" name="submit" >upload</button>
	<button class="button button__red" type="submit" name="cancel" >CANCEL</button>
</div></div>
</form>
<br></br>
</div>










</div>
<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>



</body>

<script>
vdata = '<?php echo $data ;?>';

if (vdata=="0"){
  document.getElementById("indata").style.display = "block";
}
else if(vdata=="1"){
  document.getElementById("mviewdata").style.display = "block";
}
else if(vdata=="2"){
  document.getElementById("viewdata").style.display = "block";
}
else if(vdata=="3"){
  document.getElementById("editdata").style.display = "block";
}
else{}
</script>


</html>