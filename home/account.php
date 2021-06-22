<?php
   session_start();
?>
<?php
if($_SESSION['username']) {

$servername = "localhost";
$username = "root";
$password = "";
$db = "proctordb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
$un = $_SESSION['username'];
$sql = "select * from emplogin where `loginid` like '$un'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$empid = $row["empid"];
}}

$sql = "select * from employee where empid like '%$empid%'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

$conn->close();

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$empname = $row["empname"];
$empdept = $row["empdept"];
$empmobile = $row["empmobile"];
$empemail = $row["empemail"];
}}
}
else {
echo "<h1>Please login first .</h1>";
header("location: /online proctor/proctor_login.php");
}
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
td{
    padding: 6px;
    border: 1px solid #ccc;
    text-align: center;
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
h2{
    color: DodgerBlue;
    text-align: center;
}table {
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
.button__orangelight {
    background-color:#FF7F2A;
}	
.hero-button-wrapper .button {
    width: 150px;
}
.hero-button-wrapper {
    padding: 20px 0;
}
* {
    box-sizing: border-box;
}
#cngpassword{
display: none;
}
#hide{
display: block;
}
</style>
</head>
<body>
<div>
	<img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ><br></br>
<div id="hide">
	<table border="1" align="center"  cellspacing="2" cellpadding="8" width="70%">
		<tr>
		<th colspan="4"> MY ACCOUNT </th>
		</tr>
		<tr>
			<td><label>Employe Name:</label></td>
			<td><?php echo "$empname"; ?></td>
		</tr>
		<tr>
			<td><label>Employe ID:</label></td>
			<td><?php echo "$empid"; ?></td>
		</tr>
		<tr>
			<td><label>Department:</label></td>
			<td><?php echo "$empdept"; ?></td>
		</tr>
		<tr>
			<td><label>Employe Login-ID:</label></td>
			<td><?php echo "$un"; ?></td>
		</tr>
		<tr>
			<td><label>E-Mail ID:</label></td>
			<td><?php echo "$empemail"; ?></td>
		</tr>
		<tr>
			<td><label>Mobile Number:</label></td>
			<td><?php echo "$empmobile"; ?></td>
		</tr>

	</table>
<div class="hero-button-wrapper" align="center">
<button class="button button__orangelight" onclick="changePassword()">Change Password </button>
</div>
</div>
<div id="cngpassword">
<a href="/online proctor/home/home.php"> <b> <--</b>Go Back  </a><br></br>
<form action="/online proctor/changepassword.php" method="post">
<table id="ip" align="center">
<tr>
<td>Current Password:</td>
<td><input type="password" name="currentpassword" required></td>
</tr>
<tr>
<td>New Password:</td>
<td><input type="password" name="newpass1" required></td>
</tr>
<tr>
<td>Re-Enter New Password:</td>
<td><input type="password" name="newpass2" required></td>
</tr>			
<tr>
<td colspan="2"><input class="button button__orangelight" type="submit" name="" value="Change password"></td>
</tr>
</table>
</form>
<br></br>
</div>

</div>
<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
<script>
function changePassword() {
  var x = document.getElementById("cngpassword");
  var y = document.getElementById("hide");
    y.style.display = "none";
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</html>
