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
    height: 30px;
    background: blue;
}
p{
color: white;
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
h4{
    color: black;
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
</style>
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
<div class="content">
<div class="hero-button-wrapper" align="center">
					
	<button class="button button__greenlight" onclick="addDis()">ADD Employee </button>
    <button class="button button__red" onclick="window.open('/online proctor/home/show_employee.php', '_blank')">  Show Employees </button>

</div><br></br>

<div id="adddis">
<h2> ADD New Employee</h2>

<h4><b> 1. <u>Upload Data by CSV file</u> </b></h4>

                <span id="message"></span>
                <form id="upload_csv" method="post" enctype="multipart/form-data">  
                     <div class="hero-button-wrapper" align="center">  
                          <p3><b>Note:</b> Only Upload CSV files</p3><br></br>
                          <input type="file" name="employee_file"  accept=".csv" style="margin-top:15px;" />  

                          <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />  
                     </div>  
                     <div style="clear:both"></div>  
                </form> 


<h4><b>2.  <u>ADD New Faculty Manually</u> </b></h4><br></br>

<form action="faculty_list.php" method="post">
<table border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
	<td id='tdcolour'><b>Employee ID</b></td>
	<td><input type="text" name="empid" required></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>Employee Name</b></td>
	<td><input type="text" name="empname" required></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>Dept.</b></td>
	<td><select name="empdept" id="" required>
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
	<td id='tdcolour'><b>E-mail</b></td>
	<td><input type="text" name="empemail" required></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>Employee Mobile No.</b></td>
	<td><input type="text" name="empmobile" required></td>
	</tr>
	<tr>
	<td bgcolor="#FFFFE0" colspan="2"> <input value="ADD EMPLOYEE" name="empadd" type="submit" > </td>
	</tr>
</table><br></br>
</form>
</div>

<br></br>
</div>
</div>

<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<script>
function addDis() {
  var x = document.getElementById("adddis");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

$(document).ready(function(){  
           $(document).on("submit","#upload_csv", function(e){  
                $('#message').html('');
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"faculty_list.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     dataType:"json",
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                     $('#message').html('<div id="message">'+data.success+'</div>');
                     $("#upload_csv")[0].reset();
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else{}  
                     }  
                })  
           });  
      });  

</script>
</body>
</html>









 <?php  
 if(!empty($_FILES["employee_file"]["name"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "proctordb");  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["employee_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while(($line = fgetcsv($file_data)) !== FALSE)  
           {  
                $empid = mysqli_real_escape_string($conn, $line[0]);  
                $empname = mysqli_real_escape_string($conn, $line[1]);  
                $empdept = mysqli_real_escape_string($conn, $line[2]);  
                $empemail = mysqli_real_escape_string($conn, $line[3]);  
                $empmobile = mysqli_real_escape_string($conn, $line[4]);  

                $sql0 = "INSERT INTO employee (empid ,empname ,empdept ,empemail , empmobile) VALUES ('$empid','$empname','$empdept','$empemail','$empmobile'); "; 
                mysqli_query($conn,$sql0);
                $sql1 = "INSERT INTO emplogin (empid ,loginid) VALUES ('$empid','$empid');"; 
                mysqli_query($conn,$sql1);  
           }
           fclose($file_data);
      }  
      else  
      {  
           echo 'Error1'; 
      }  
 }  
 else   {}   
 ?> 






<?php
 if (isset($_POST['empadd'])){

$conn = new mysqli('localhost','root','','proctordb');
$empid = $conn->real_escape_string($_REQUEST['empid']);
$empname = $conn->real_escape_string($_REQUEST['empname']);
$empdept = $conn->real_escape_string($_REQUEST['empdept']);
$empemail = $conn->real_escape_string($_REQUEST['empemail']);
$empmobile = $conn->real_escape_string($_REQUEST['empmobile']);
$sql = "INSERT INTO employee (empid ,empname ,empdept ,empemail , empmobile) VALUES ('$empid','$empname','$empdept','$empemail','$empmobile'); 
        INSERT INTO emplogin (empid ,loginid) VALUES ('$empid','$empid')";



if ($conn->multi_query($sql) === TRUE) {
  echo '<script>alert("New Employee Added successfully.");window.location.href= "/online proctor/home/faculty_list.php";</script>';
} 
else{
  echo '<script>alert("Failed to Add New Employee.");window.location.href= "/online proctor/home/faculty_list.php";</script>';
}
$conn->close();


}


?>