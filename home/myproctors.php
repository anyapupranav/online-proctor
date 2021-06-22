<?php
   session_start();
if($_SESSION['username']) {

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
div{
    width: 1024px;
    margin:0 auto;
    background: white;
}
.div1{
    width: 1024px;
    margin: auto ;
    clear: both;
    background: #012D58;
    text-align: center;
    height: auto;
    color: #FFF;
}
p{
color: white;
}
p1{
color: black;
align: center;
}
p2{
color: red;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
.button__red {
    background-color: #FF6384;}
.button__greenlight {
    background-color: #06BB64;}
.button__blue {
    background-color:#E5041C;}
.button__black {
    background-color:#FF9F13;}
.button__green {
    background-color:#006600;}
.button__orange {
    background-color:#5D9CEC;}
.button__orangelight {
    background-color:#FF7F2A;}
.button__pink {
    background-color:#D45151;}	
	
.button__pink1 {
    background-color:#330000;}	
.button__pink2 {
    background-color:#0C1616;}			
	
.hero-button-wrapper .button {
    width: 150px;
}
.hero-button-wrapper {
    padding: 20px 0;
}
* {
    box-sizing: border-box;
}
#content {
position:relative;
width:800px;
float:right;
text-align:justify;
margin:8 8 8 8px;
padding:10px 0
}
h2{
    color: DodgerBlue;
    text-align: center;
}
td{
padding: 8px;
text-align: center;
}
#tdcolour{
background: #00BFFF;
}
table{
    color: black;
    border-collapse: collapse;
}
#adddis{
display: none;
}
#proctorsadd{
display: none;
}
#proctorsdel{
display: none;
}
</style>
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
<div class="content">
<div class="hero-button-wrapper" align="center">
					
	<button class="button button__greenlight" onclick="proctorshow()">SHOW PROCTORS </button>
	<button class="button button__orange" onclick="addproctors()">ADD PROCTORS </button>
    <button id="myBtn" class="button button__blue" >DELETE PROCTORS </button>
</div><br></br>
</div>



<!-- The Popup -->
<div id="myModal" class="modal">

  <!-- Popup content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p1 align="center"><b>Instructions Before Deleting Proctors</b></p1>
<ol>
  <li>Proctor's cannot be deleted directly, while the students data is present.</li>
  <li>Before deleting the proctor the students data should be transfered to some other proctor's.</li>
  <li>If all the students data is transfered to another proctor then the status of proctor will be set to Inactive. Then you can delete the proctor.</li>
</ol> 
<p2><b>Note:</b> Deleting proctor means the faculty lose his/her access to proctoring however the faculty can be able to login into the faculty place.</p2>
<br></br>
<div class="hero-button-wrapper" align="center">
<button align="center" onclick="delproctors()" >  OK </button></div>
  </div>

</div>




<div id="adddis">


<select>
    <option disabled selected>-- Select PROCTORS --</option>
    <option value = "allproc" > ALL PROCTORS </option>
    <option value = "activeproc" > ACTIVE PROCTORS </option>
    <option value = "inactiveproc" > INACTIVE PROCTORS </option>
</select>

<h2> LIST OF ALL PROCTORS</h2>




	<?php 
	$mysql = new mysqli('localhost','root','','proctordb');

    $temploginid = $_SESSION['username'];

    $sqll = "select * from employee where empid = '$temploginid'";
    $sqll_result = mysqli_query($mysql,$sqll);
    if ($sqll_result->num_rows > 0){
	while($row = $sqll_result->fetch_assoc() ){
    $currentproctorheaddept = $row['empdept'];
    }}


	$sql="SELECT * FROM employee
            INNER JOIN emplogin
            ON emplogin.empid=employee.empid 
            where employee.empdept = '$currentproctorheaddept' and emplogin.role = 'proctor' ";
	$result=$mysql->query($sql);

	if ($result->num_rows > 0){
?>
    <table border="1" cellpadding="3" cellspacing="0" align="center">
        <tr>
	        <td id='tdcolour' colspan="7"><b>LIST OF ALL PROCTORS</b></td>
        </tr>
        <tr>
	        <td ><b>Employee ID</b></td>
	        <td ><b>Employee Name</b></td>
            <td ><b>Department</b></td>
        </tr>   
<?php
	while($row = $result->fetch_assoc() ){
	echo "<tr>";
	echo "<td>".$row['empid']."</td>"."<td>".$row['empname']."</td>"."<td>".$row['empdept']."</td>";
	}
	echo "</tr>";
	}
	?>
	</table><br></br>




<h2> LIST OF ACTIVE PROCTORS</h2>




<table border="1" cellpadding="3" cellspacing="0" align="center">
<tr>
	<td id='tdcolour' colspan="7"><b>List Of Proctors</b></td>
</tr>
<tr>
	<td ><b>Employee ID</b></td>
	<td ><b>Employee Name</b></td>
    <td ><b>Year</b></td>
    <td ><b>Section</b></td>
    <td ><b>Batch</b></td>
    <td ><b>Status</b></td>
</tr>   
	<?php 
	$mysql = new mysqli('localhost','root','','proctordb');

    $temploginid = $_SESSION['username'];

    $sqll = "select * from employee where empid = '$temploginid'";
    $sqll_result = mysqli_query($mysql,$sqll);
    if ($sqll_result->num_rows > 0){
	while($row = $sqll_result->fetch_assoc() ){
    $currentproctorheaddept = $row['empdept'];
    }}


	$sql="SELECT employee.empname, employee.empid, proctorassigned.proctorstatus
            FROM employee
            INNER JOIN proctorassigned 
            ON proctorassigned.empid=employee.empid 
            where employee.empdept = '$currentproctorheaddept' ";
	$result=$mysql->query($sql);

	if ($result->num_rows > 0){
	while($row = $result->fetch_assoc() ){
	echo "<tr>";
    if($row['proctorstatus'] === '0'){$status = 'INACTIVE';}
    elseif($row['proctorstatus'] === '1'){$status = 'ACTIVE';}
	echo "<td>".$row['empid']."</td>"."<td>".$row['empname']."</td>"."<td>"."</td>"."<td>"."</td>"."<td>"."</td>"."<td>".$status."</td>";
	}
	echo "</tr>";
	}
	?>
	</table><br></br>




<h2> LIST OF INACTIVE PROCTORS</h2>




<table border="1" cellpadding="3" cellspacing="0" align="center">
<tr>
	<td id='tdcolour' colspan="7"><b>List Of Proctors</b></td>
</tr>
<tr>
	<td ><b>Employee ID</b></td>
	<td ><b>Employee Name</b></td>
    <td ><b>Year</b></td>
    <td ><b>Section</b></td>
    <td ><b>Batch</b></td>
    <td ><b>Status</b></td>
</tr>   
	<?php 
	$mysql = new mysqli('localhost','root','','proctordb');

    $temploginid = $_SESSION['username'];

    $sqll = "select * from employee where empid = '$temploginid'";
    $sqll_result = mysqli_query($mysql,$sqll);
    if ($sqll_result->num_rows > 0){
	while($row = $sqll_result->fetch_assoc() ){
    $currentproctorheaddept = $row['empdept'];
    }}


	$sql="SELECT employee.empname, employee.empid, proctorassigned.proctorstatus
            FROM employee
            INNER JOIN proctorassigned 
            ON proctorassigned.empid=employee.empid 
            where employee.empdept = '$currentproctorheaddept' ";
	$result=$mysql->query($sql);

	if ($result->num_rows > 0){
	while($row = $result->fetch_assoc() ){
	echo "<tr>";
    if($row['proctorstatus'] === '0'){$status = 'INACTIVE';}
    elseif($row['proctorstatus'] === '1'){$status = 'ACTIVE';}
	echo "<td>".$row['empid']."</td>"."<td>".$row['empname']."</td>"."<td>"."</td>"."<td>"."</td>"."<td>"."</td>"."<td>".$status."</td>";
	}
	echo "</tr>";
	}
	?>
	</table><br></br>


</div>



<div id="proctorsadd">
<h2> ADD PROCTORS </h2>
<form action="myproctors.php" method="post">
<table border="1px" align="center" >
<tr>
<td id='tdcolour' colspan="2"> <b>  ADD PROCTORS </b> </td>
</tr>
<tr>
<td> <b> Employee ID: </b> </td>
<td>  <input type="text" name="empid" required>  </td>
</tr>
<tr>
<td colspan="2">  <input type="submit" name="addproctor" value="ADD">  </td>
</tr>
</table><br></br>
</form>
</div>



<div id="proctorsdel">
<h2> DELETE PROCTORS </h2>

<table border="1px" align="center" >
<tr>
<td id='tdcolour' colspan="2"> <b>  TRANSFER STUDENTS PROCTORING DATA </b> </td>
</tr>
<tr>
<td> <b> FROM Employee ID: </b> </td>
<td>  <input type="text" name="fromempid" required>  </td>
</tr>
<tr>
<td> <b> TO Employee ID: </b> </td>
<td>  <input type="text" name="toempid" required>  </td>
</tr>
<tr>
<td colspan="2">  <input type="submit" name="delproctor" value="TRANSFER DATA & DELETE">  </td>
</tr>
</table><br></br>

</div>



</div><br></br>
<div class="div1">
    <br></br>
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
    <br></br>
</div>
<script>

// Get the popup
var modal = document.getElementById("myModal");

// Get the button that opens the popup
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the popup
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the popup
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the popup
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function proctorshow() {
  var x = document.getElementById("adddis");
  document.getElementById("proctorsdel").style.display = "none";
  document.getElementById("proctorsadd").style.display = "none";
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function addproctors() {
  var y = document.getElementById("proctorsadd");
  document.getElementById("proctorsdel").style.display = "none";
  document.getElementById("adddis").style.display = "none";
  if (y.style.display === "block") {
    y.style.display = "none";
  } else {
    y.style.display = "block";
  }
}
function delproctors() {
  modal.style.display = "none";
  var z = document.getElementById("proctorsdel");
  document.getElementById("adddis").style.display = "none";
  document.getElementById("proctorsadd").style.display = "none";
  if (z.style.display === "block") {
    z.style.display = "none";
  } else {
    z.style.display = "block";
  }
}

</script>
</body>
</html>





<?php

if (isset($_POST['addproctor'])){

$server = "localhost";        
$usrnm = "root";        
$pswrd = "";  
$db = "proctordb";
$conn = mysqli_connect($server,$usrnm,$pswrd,$db);       
if(!$conn){     die("Server error!!!");        }

$empid = $_POST['empid'];  

$sql1 = "select * from emplogin where empid = '$empid' ";
$res = $conn->query($sql1);

if ($res === false)  {  die(mysqli_error($conn));  }

if ($res->num_rows > 0){
	while($row = $res->fetch_assoc() ){
    
    $checkrole = $row['role'];

    }}

if ($checkrole != 'faculty'){
    die ('<script>alert("ERROR!!  cannot Add as proctor") </script>');
}
else{
$sql = "update emplogin set role = 'proctor' where empid = '$empid' and role = 'faculty' ";
$result = $conn->query($sql);
$sql0 = "INSERT INTO proctorassigned (empid) VALUES ('$empid');";
$re = $conn->query($sql0);
}

if ($result === true && $re === true)  {    echo '<script>alert("Sucessfully added as proctor.") </script>';   }

if ($result === false || $re === false) { die(mysqli_error($conn)); }
}



if (isset($_POST['delproctor'])){

}
?>