<?php
   session_start();
?>
<?php
if($_SESSION['username']) {
if ($_SESSION['loginas'] == 'faculty'){
$conn = new mysqli("localhost", "root", "", "proctordb");

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$un = $_SESSION['username'];
$sql = "select * from emplogin where `loginid` like '$un'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$password = $row["password"];
}}
$conn->close();

$password1 = $_POST['newpass1'];
$password2 = $_POST['newpass2'];
$currentpassword = $_POST['currentpassword'];

if ($password == $currentpassword){
if ($password1 == $password2){
$conn = new mysqli("localhost", "root", "", "proctordb");
$sql = "UPDATE emplogin SET password='$password1' where loginid like '%$un%'";
$result = $conn->query($sql);
echo '<script>alert("password update sucessfull.");window.location.href= "/online proctor/home/account.php";</script>';
}
else {echo '<script>alert("Passwords Do not match.");window.location.href= "/online proctor/home/account.php";</script>';}
}
else {echo '<script>alert("Password is Invalid!");window.location.href= "/online proctor/home/account.php";</script>';}
}
elseif($_SESSION['loginas'] == 'student'){
$conn = new mysqli("localhost", "root", "", "proctordb");

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$un = $_SESSION['username'];
$sql = "select * from studentlogin where `registernumber` like '$un'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$password = $row["password"];
}}
$conn->close();

$password1 = $_POST['newpass1'];
$password2 = $_POST['newpass2'];
$currentpassword = $_POST['currentpassword'];

if ($password == $currentpassword){
if ($password1 == $password2){
$conn = new mysqli("localhost", "root", "", "proctordb");
$sql = "UPDATE studentlogin SET password='$password1' where registernumber like '%$un%'";
$result = $conn->query($sql);
echo '<script>alert("password update sucessfull.");window.location.href= "/online proctor/home/saccount.php";</script>';
}
else {echo '<script>alert("Passwords Do not match.");window.location.href= "/online proctor/home/saccount.php";</script>';}
}
else {echo '<script>alert("Password is Invalid!");window.location.href= "/online proctor/home/saccount.php";</script>';}
}}

else {
echo "<h1>Please login first .</h1>";
header("location: /online proctor/proctor_login.php");
}
?>

















