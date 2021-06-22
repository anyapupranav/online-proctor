<?php
   session_start();
if($_SESSION['username']) {

}
else {
echo "<h1>Please login first .</h1>";
header("location: /online proctor/proctor_login.php");
}
?>

<?php
if(isset($_POST['empid'])){       
$server = "localhost";        
$usrnm = "root";        
$pswrd = "";  
$db = "proctordb";
$conn = mysqli_connect($server,$usrnm,$pswrd,$db);       
if(!$conn){ die("Server error!!!"); }

$dis = 1;

$empid = $_POST['empid'];
$_SESSION['sesempid'] = $empid; 

$sql = "select * from emplogin where `empid` like '$empid'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$role = $row["role"];
}}

if ($result === false) { die(mysqli_error($conn)); }


$sql1 = "select * from employee where `empid` like '$empid'";
$res = $conn->query($sql1);

if ($res === false) { die(mysqli_error($conn)); }

if ($res->num_rows > 0){
while($row = $res->fetch_assoc() ){
$empname = $row["empname"];
$empdept = $row["empdept"];
$empemail = $row["empemail"];
}}
}




if(isset($_POST['changerole'])){   
$server = "localhost";        
$usrnm = "root";        
$pswrd = "";  
$db = "proctordb";
$conn = mysqli_connect($server,$usrnm,$pswrd,$db);       
if(!$conn){ die("Server error!!!"); }

$sessempid = $_SESSION['sesempid'];

$updaterole = $_POST['uprole'];
$sql2 = "update emplogin set role = '$updaterole' where empid = '$sessempid' ";
$conn->query($sql2);
unset($_SESSION['role']);
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
text-align: center;
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
#empdiv{
display: none;
}
</style>
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
	<table border="1" cellpadding="3" cellspacing="0" align="center">
<form action="assign_roles.php" method="post" >
	<tr>
	<td> Employee Id: </td> 
	<td> <input type="text" name="empid"> </td>
	</tr>
	<tr>
	<td colspan="2"> <input type="submit" value="search" > </td>
	</tr>
</form>
	</table><br></br>

<div id="empdiv">

    <table border="1" align="center"  cellspacing="2" cellpadding="8" width="70%">
    <form action="assign_roles.php" method="post">
	<tr>
	<th colspan="4"> EMPLOYEE PROFILE </th>
	</tr>
	<td class="fcbold" >EMPLOYEE NAME</td> <td colspan="2" > <?php echo $empname ; ?> </td> 
	</tr>
	<tr>
	<td class="fcbold">EMPLOYEE DEPARTMENT</td><td colspan="2"> <?php echo $empdept ; ?> </td>
	</tr>
	<tr>
	<td class="fcbold" > EMPLOYEE E-MAIL</td><td colspan="2"> <?php echo $empemail ; ?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > EMPLOYEE CURRENT ROLE</td><td colspan="2"> <?php echo $role ; ?> </td> 
	</tr>
	<tr>
	<td class="fcbold" > CHANGE ROLE TO</td><td colspan="2">
    <select name="uprole" >
        <option value="hod">HOD</option>
        <option value="principal">PRINCIPAL </option>
        <option value="faculty" selected>FACULTY</option>
        <option value="prochead">PROCTOR HEAD</option>
    </select></td> 
	</tr>
    <tr>
	<td class="fcbold" colspan="4"> <input type="submit" name="changerole" value="CHANGE ROLE" required></td> 
	</tr>
    </form>
    </table><br></br>

</div>
</div>

<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
<script>
di = '<?php echo $dis;?>';

if (di=="1"){
  document.getElementById("empdiv").style.display = "block";
}
</script>
</html>


