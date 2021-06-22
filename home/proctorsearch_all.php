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
}
input[type="tel"]::placeholder{ 
    text-align: center;
}
table{
    border-collapse: collapse;
}
</style>
</head>
<body>
<div>
	<img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ><br></br>
    <p1> Welcome <?php echo "$empname"; ?>!</p1>
	<table border="1px" width="400" color="white" align="center">
   <form class="box" action="proctorsearch_all.php" method="post">
	<tr>
	<td><label style="color:black;">Enter Register Number</label></td>
	<td><input type="tel" placeholder="Register Number" name="studentreg" required></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input type="submit" name="" value="Search"></td>
	</tr>
	<span style="color:white;" ></span>
   </form>
	</table>
<br></br>
</div>
<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
</html>

