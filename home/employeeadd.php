<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ERROR | E_PARSE);
   session_start();
if($_SESSION['username']) {

}
else {
echo "<h1>Please login first .</h1>";
header("location: /online proctor/proctor_login.php");
}
$conn = new mysqli('localhost','root','','proctordb');
$empid = $conn->real_escape_string($_REQUEST['empid']);
$empname = $conn->real_escape_string($_REQUEST['empname']);
$empdept = $conn->real_escape_string($_REQUEST['empdept']);
$empemail = $conn->real_escape_string($_REQUEST['empemail']);
$empmobile = $conn->real_escape_string($_REQUEST['empmobile']);
$sql = "INSERT INTO employee (empid ,empname ,empdept ,empemail , empmobile) VALUES ('$empid','$empname','$empdept','$empemail','$empmobile'); INSERT INTO emplogin (empid ,loginid) VALUES ('$empid','$empid')";



if ($conn->multi_query($sql) === TRUE) {
  echo '<script>alert("New Employee Added successfully.");window.location.href= "/online proctor/home/faculty_list.php";</script>';
} 
else{
  echo '<script>alert("Failed to Add New Employee.");window.location.href= "/online proctor/home/faculty_list.php";</script>';
}
$conn->close();


?>
