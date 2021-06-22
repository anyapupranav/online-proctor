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
td{
    padding: 6px;
    border: 1px solid #ccc;
    text-align: center;
    background: white;
}
#tdcolour{
background: #00BFFF;
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
.groupdiv{}
.singlediv{}
p{
    color: white;
}
h2{
    color: DodgerBlue;
    text-align: center;
}
</style>
</head>
<body>
<div>
	<img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ><br></br>


<h2>  Assign Single student  </h2>


    <table  cellpadding="3" cellspacing="0" align="center">
    <form action="" method="post">
        <tr>
            <td id="tdcolour">  <b> Select Students </b> </td>
            <td rowspan="2"> &#10132; <b>ASSIGN TO</b>  &#10132;</td>
            <td id="tdcolour"> <b> Select Proctor </b> </td>
        </tr>
        <tr>
            <td> <input type="text" placeholder="Enter Register Number..." name="fromregisternumber" required>  </td>
            <td>                           <select>
                                                <option disabled selected>-- Select Proctor --</option>
                                                <?php
                                                $mysql = new mysqli('localhost','root','','proctordb');

                                                $temploginid = $_SESSION['username'];

                                                $sqll = "select * from employee where empid = '$temploginid'";
                                                $sqll_result = mysqli_query($mysql,$sqll);
                                                if ($sqll_result->num_rows > 0){
	                                            while($row = $sqll_result->fetch_assoc() ){
                                                $currentproctorheaddept = $row['empdept'];
                                                }}
                                                $conn = mysqli_connect('localhost','root','','proctordb');
                                                $records = mysqli_query($conn, "SELECT employee.empname
                                                                                FROM employee
                                                                                INNER JOIN proctorassigned 
                                                                                ON proctorassigned.empid=employee.empid 
                                                                                where employee.empdept = '$currentproctorheaddept' and proctorassigned.proctorstatus = '0'");  

                                                while($row = mysqli_fetch_array($records))
                                                {
                                                echo "<option value='". $row['empname'] ."'>" .$row['empname'] ."</option>";  
                                                }	
                                                ?>  
                                            </select>  
            </td>
        </tr>
        <tr>
            <td colspan="3"> <input type="submit" name="" value="ASSIGN" > </td>
        </tr>
    </form>
    </table><br></br>






<h2>  Assign Multiple students  </h2>
    <table  cellpadding="3" cellspacing="0" align="center">
    <form action="" method="post">
        <tr>
            <td colspan="3" id="tdcolour">  <b> Select Students </b> </td>
            <td rowspan="2"> &#10132; <b>ASSIGN TO</b>  &#10132;</td>
            <td id="tdcolour"> <b> Select Proctor </b> </td>
        </tr>
        <tr>
            <td>  From: <br></br> <input type="text" placeholder="Enter Register Number..." name="fromregisternumber" required>  </td>
            <td>  ---  </td>
            <td>  To: <br></br> <input type="text" placeholder="Enter Register Number..." name="toregisternumber" required>  </td>
            
            <td>                           <select>
                                                <option disabled selected>-- Select Proctor --</option>
                                                <?php
                                                $mysql = new mysqli('localhost','root','','proctordb');

                                                $temploginid = $_SESSION['username'];

                                                $sqll = "select * from employee where empid = '$temploginid'";
                                                $sqll_result = mysqli_query($mysql,$sqll);
                                                if ($sqll_result->num_rows > 0){
	                                            while($row = $sqll_result->fetch_assoc() ){
                                                $currentproctorheaddept = $row['empdept'];
                                                }}
                                                $conn = mysqli_connect('localhost','root','','proctordb');
                                                $records = mysqli_query($conn, "SELECT employee.empname
                                                                                FROM employee
                                                                                INNER JOIN proctorassigned 
                                                                                ON proctorassigned.empid=employee.empid 
                                                                                where employee.empdept = '$currentproctorheaddept' and proctorassigned.proctorstatus = '0'");  

                                                while($row = mysqli_fetch_array($records))
                                                {
                                                echo "<option value='". $row['empname'] ."'>" .$row['empname'] ."</option>";  
                                                }	
                                                ?>  
                                            </select>  
            </td>
        </tr>
        <tr>
            <td colspan="5"> <input type="submit" name="" value="ASSIGN" > </td>
        </tr>
    </form>
    </table><br></br>

    <h2>  List of un-assigned Students  </td><br></br>

<table border="1" cellpadding="3" cellspacing="0" align="center">
<tr>
	<td id='tdcolour'><b>Register Number</b></td>
	<td id='tdcolour'><b>Student Name</b></td>
    <td id='tdcolour'><b>Year</b></td>
    <td id='tdcolour'><b>Section</b></td>
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


	$sql="SELECT * from studentsdetails where dept = '$currentproctorheaddept' ";
	$result=$mysql->query($sql);

	if ($result->num_rows > 0){
	while($row = $result->fetch_assoc() ){
    $year = $row['doj'];
	echo "<tr>";
	echo "<td>".$row['registernumber']."</td>"."<td>".$row['sname']."</td>"."<td>".$year."</td>"."<td>".$row['section']."</td>";
	}
	echo "</tr>";
	}
	?>
	</table><br></br>

</div>
<div class="div1">
    <br></br>
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
    <br></br>
</div>
</body>
</html>