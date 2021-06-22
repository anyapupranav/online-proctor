<?php   
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ERROR | E_PARSE);

$flag = 0;  
if(isset($_POST['username'])){       
$server = "localhost";        
$usrnm = "root";        
$pswrd = "";  
$db = "proctordb";
$connection = mysqli_connect($server,$usrnm,$pswrd,$db);       
if(!$connection){           
die("Server error!!!");        
}
       
$username = $_POST['username'];        
$password = $_POST['password'];
$loginas = $_POST['loginas'];

if ($loginas=='student'){
$query = "SELECT * FROM `proctordb`.`studentlogin` WHERE `registernumber`='$username' and `password`='$password'";
$result = mysqli_query($connection,$query);
$count = mysqli_num_rows($result);
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$role = $row["role"];
}
}
   session_start();
   $_SESSION['username'] = $_POST['username'];
   $_SESSION['loginas'] = $_POST['loginas'];


if($count > 0){            
$flag = 1;
header("location: /online proctor/home/student.php");
}
else        
{
echo '<script>alert("Invalid username or password.")</script>';
}
}
elseif($loginas=='faculty'){
$query = "SELECT * FROM `proctordb`.`emplogin` WHERE `loginid`='$username' and `password`='$password'";
$result = mysqli_query($connection,$query);
$count = mysqli_num_rows($result);
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$role = $row["role"];
}
}
   session_start();
   $_SESSION['username'] = $_POST['username']; 
   $_SESSION['loginas'] = $_POST['loginas'];
   $_SESSION['role'] = $role;

if($count > 0){            
$flag = 1;
if($role==principal){            
header("location: /online proctor/home/home.php");      
}
if($role==admin){            
header("location: /online proctor/home/home.php");      
}
elseif($role==hod){ 
header("location: /online proctor/home/home.php"); 
}
elseif($role==proctor){ 
header("location: /online proctor/home/home.php"); 
}
elseif($role==faculty){ 
header("location: /online proctor/home/home.php"); 
}
elseif($role==prochead){ 
header("location: /online proctor/home/home.php"); 
}
}
else        
{
echo '<script>alert("Invalid username or password.")</script>';
}                 
}
$connection->close();    
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
    background: azure;
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
}
input[type="text"],input[type="password"]::placeholder{ 
    text-align: center;
}
table{
    width: 350;
    color: white;
    border-collapse: collapse;
}
</style>
</head>
<body>
<div>
	<img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ><br></br>
	<h2>PROCTOR LOGIN PAGE</h2>
	<table align="center">
   <form action="proctor_login.php" method="post">
	<tr>
	<td><label style="color:black;">UserID   </label></td>
	<td><input type="text" placeholder="User Id" name="username" required></td>
	</tr>
	<tr>
	<td><label style="color:black;">Password </label></td>
	<td><input type="password" placeholder="Password" name="password" required></td>
	</tr>
	<tr><td colspan="2" align="center"><label style="color:black;">Login as: </label>
	<select name="loginas" id="">
	<option value="faculty">Faculty</option>
	<option value="student">Student</option>
	</select></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><label style="color:black;"><input type="checkbox" checked="checked" name="remember"> Remember me</label></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input type="submit" name="" value="Login"></td>
	</tr>
	<span style="color:white;" ></span>
   </form>
	</table><br></br>
</div>
<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
</html>
































