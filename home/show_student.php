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
.btn{
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
}
.btn-danger{
background-color: #FF6384;
}
.btn-primary{
background-color: #06BB64;
}
.hero-button-wrapper {
    padding: 20px auto;
}
p{
color: white;
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
</style>
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img><br></br>
<table border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
	<td id='tdcolour'><b>Register Number</b></td>
	<td id='tdcolour'><b>Student Name</b></td>
	<td id='tdcolour'><b>Dept.</b></td>
	<td id='tdcolour'><b>Date of Joining</b></td>
	<td id='tdcolour'><b>Personal E-mail</b></td>
	<td id='tdcolour'><b>Student Mobile No.</b></td>
	</tr>
	<?php
	$mysql = new mysqli('localhost','root','','proctordb');
	$num_per_page=100;


	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}

	$start_from=($page-1)*100;

	$sql="select * from studentsdetails limit $start_from,$num_per_page";
	$result=$mysql->query($sql);

	if ($result->num_rows > 0){
	while($row = $result->fetch_assoc() ){
	echo "<tr>";
	echo "<td>".$row['registernumber']."</td>"."<td>".$row['sname']."</td>"."<td>".$row['dept']."</td>"."<td>".$row['doj']."</td>"."<td>".$row['pemail']."</td>"."<td>".$row['smobile']."</td>";
	}
	echo "</tr>";
	}
	?>
	</table><br></br>
<?php 
        
                $pr_query = "select * from studentsdetails ";
                $pr_result = mysqli_query($mysql,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);

                if($page>1)
                {
                    echo "<a href='show_student.php?page=".($page-1)."' class='btn btn-danger hero-button-wrapper'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    //echo "<a href='show_student.php?page=".$i."' class='btn btn-primary hero-button-wrapper'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='show_student.php?page=".($page+1)."' class='btn btn-danger hero-button-wrapper'>Next </a>";
                }
        
        ?>
</div>

<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
</html>
