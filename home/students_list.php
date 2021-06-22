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
p3{
color: red;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
<div class="content">
<div class="hero-button-wrapper" align="center">
					
	<button class="button button__greenlight" onclick="addDis()">ADD Students </button>
	<a href="/online proctor/home/show_student.php" class="button button__red" target="_blank">Show Students </a>	
</div><br></br>

</div>
<div id="adddis">
<h2><b> ADD New Students</b></h2><br></br>

<h4><b> 1. <u>Upload Data by CSV file</u> </b></h4>

                <span id="message"></span>
                <form id="upload_csv" method="post" enctype="multipart/form-data">  
                     <div class="hero-button-wrapper" align="center">  
                          <p3><b>Note:</b> Only Upload CSV files</p3><br></br>
                          <input type="file" name="students_file"  accept=".csv" style="margin-top:15px;" />  

                          <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />  
                     </div>  
                     <div style="clear:both"></div>  
                </form> 


<h4><b>2.  <u>ADD New Students Manually</u> </b></h4><br></br>

<form action="students_list.php" method="post">
<table border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
	<td id='tdcolour'><b>Register Number*</b></td>
	<td><input type="text" name="registernumber" required></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>Student Name*</b></td>
	<td><input type="text" name="sname" required></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>Dept.*</b></td>
	<td><select name="dept" id="" required>
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
	<td id='tdcolour'><b>Date of Joining</b></td>
	<td><input type="date" name="doj"></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>E-mail</b></td>
	<td><input type="text" name="pemail" ></td>
	</tr>
	<tr>
	<td id='tdcolour'><b>Student Mobile No.</b></td>
	<td><input type="text" name="smobile" ></td>
	</tr>
	<tr>
	<td bgcolor="#FFFFE0" colspan="2"> <input value="ADD STUDENT" type="submit" name="studentadd"> </td>
	</tr>
</table><br></br>
</form>
</div>
</div>

<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
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
                     url:"students_list.php",  
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
 if(!empty($_FILES["students_file"]["name"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "proctordb");  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["students_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["students_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while(($line = fgetcsv($file_data)) !== FALSE)  
           {  
                $sname = mysqli_real_escape_string($conn, $line[0]);  
                $registernumber = mysqli_real_escape_string($conn, $line[1]);  
                $dept = mysqli_real_escape_string($conn, $line[2]);   
                
                $sql0 = "INSERT INTO studentsdetails (sname, registernumber, dept) VALUES ('$sname', '$registernumber', '$dept');"; 
                mysqli_query($conn,$sql0);
                $sql1 = " INSERT INTO studentlogin (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql1);
		        $sql2 = " INSERT INTO sem1 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql2);
		        $sql3 = " INSERT INTO sem2 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql3);
		        $sql4 = " INSERT INTO sem3 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql4);
		        $sql5 = " INSERT INTO sem4 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql5);
		        $sql6 = " INSERT INTO sem5 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql6);
		        $sql7 = " INSERT INTO sem6 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql7);
		        $sql8 = " INSERT INTO sem7 (registernumber) values ('$registernumber');"; 
                mysqli_query($conn,$sql8);
		        $sql9= " INSERT INTO sem8 (registernumber) values ('$registernumber');";  
                mysqli_query($conn,$sql9);
                
              
                
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
 if (isset($_POST['studentadd'])){
 $conn = new mysqli('localhost','root','','proctordb');
$registernumber = $conn->real_escape_string($_REQUEST['registernumber']);
$sname = $conn->real_escape_string($_REQUEST['sname']);
$dept = $conn->real_escape_string($_REQUEST['dept']); 
$doj = $conn->real_escape_string($_REQUEST['doj']);
$pemail = $conn->real_escape_string($_REQUEST['pemail']);
$smobile = $conn->real_escape_string($_REQUEST['smobile']);
$sql = "INSERT INTO studentsdetails (registernumber ,sname ,dept ,doj ,pemail , smobile) VALUES ('$registernumber','$sname','$dept','$doj','$pemail','$smobile'); 
		insert into studentlogin (registernumber) values ('$registernumber');
		insert into sem1 (registernumber) values ('$registernumber');
		insert into sem2 (registernumber) values ('$registernumber');
		insert into sem3 (registernumber) values ('$registernumber');
		insert into sem4 (registernumber) values ('$registernumber');
		insert into sem5 (registernumber) values ('$registernumber');
		insert into sem6 (registernumber) values ('$registernumber');
		insert into sem7 (registernumber) values ('$registernumber');
		insert into sem8 (registernumber) values ('$registernumber')";

if ($conn->multi_query($sql) === TRUE) {
  echo '<script>alert("New Student Added successfully.");window.location.href= "/online proctor/home/students_list.php";</script>';
} 
else{
  echo '<script>alert("Failed to Add New Student.");window.location.href= "/online proctor/home/students_list.php";</script>';
}
$conn->close();
 }
 ?>