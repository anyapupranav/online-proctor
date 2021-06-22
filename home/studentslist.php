<?php
   session_start();
?>
<?php
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
td{
padding: 8px;
text-align: center;
}
table{
    color: black;
    border-collapse: collapse;
}
</style>
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ><br></br>
    <table border="1" cellpadding="3" cellspacing="0" align="center">
	<?php
	for($i=1;$i<=6;$i++)
	{
	echo "<tr>";
	for ($j=1;$j<=5;$j++)
 	{
 	echo "<td>$i * $j = ".$i*$j."</td>";
  	}
  	echo "</tr>";
  	}
	?>
	</table>
<br></br>

</div>
<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
</html>
