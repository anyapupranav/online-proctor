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
#cssmenu,
#cssmenu ul,
#cssmenu li,
#cssmenu a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  font-weight: normal;
  text-decoration: none;
  line-height: 1;
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  position: relative;
}
#cssmenu a {
  line-height: 1.3;
}
#cssmenu {
  width: 200px;
  background: #fff;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  padding: 3px;
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
}
#cssmenu > ul > li {
  margin: 0 0 2px 0;
}
#cssmenu > ul > li:last-child {
  margin: 0;
}
#cssmenu > ul > li > a {
  font-size: 15px;
  display: block;
  color: #ffffff;
  text-shadow: 0 1px 1px #000;
  background: #565656;
  background: -moz-linear-gradient(#565656 0%, #323232 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #565656), color-stop(100%, #323232));
  background: -webkit-linear-gradient(#565656 0%, #323232 100%);
  background: linear-gradient(#565656 0%, #323232 100%);
  border: 1px solid #000;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
#cssmenu > ul > li > a > span {
  display: block;
  border: 1px solid #666666;
  padding: 6px 10px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  font-weight: bold;
}
#cssmenu > ul > li > a:hover {
  text-decoration: none;
}
#cssmenu > ul > li.active {
  border-bottom: none;
}
#cssmenu > ul > li.active > a {
  background: #97be10;
  background: -moz-linear-gradient(#97be10 0%, #79980d 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #97be10), color-stop(100%, #79980d));
  background: -webkit-linear-gradient(#97be10 0%, #79980d 100%);
  background: linear-gradient(#97be10 0%, #79980d 100%);
  color: #fff;
  text-shadow: 0 1px 1px #000;
  border: 1px solid #79980d;
}
#cssmenu > ul > li.active > a span {
  border: 1px solid #97be10;
}
#cssmenu > ul > li.has-sub > a span {
  background: url(../images/icon_plus.png) 98% center no-repeat;
}
#cssmenu > ul > li.has-sub.active > a span {
  background: url(../images/icon_minus.png) 98% center no-repeat;
}
/* Sub menu */
#cssmenu ul ul {
  padding: 5px 12px;
  display: none;
}
#cssmenu ul ul li {
  padding: 3px 0;
}
#cssmenu ul ul a {
  display: block;
  color: #595959;
  font-size: 13px;
  font-weight: bold;
}
#cssmenu ul ul a:hover {
  color: #79980d;
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
.button__purple
{
  background-color:#663399;
}
.button__crimson{
    background-color: #DC143C;
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
.button__bt
{
	background-color:#1E90FF;
}
	
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
#leftmenu {
width:180px;
float:left;
margin-right:10px;
}
#content {
position:relative;
width:800px;
float:right;
text-align:justify;
margin:8 8 8 8px;
padding:10px 0
}
</style>
</head>
<body>
<div>
    <img src="https://www.anits.edu.in/images/banner2.jpg" alt="anits banner" class="center" ></img>
<div id='leftmenu'>
<div id='cssmenu'>
<ul>
    <li class='active'><a href='#'><span>Home</span></a></li>
    <li ><a href='/online proctor/home/saccount.php'><span>My Account</span></a></li>
    <li ><a href='/online proctor/logout.php'><span>Logout</span></a></li>
</ul>
</div>
</div>
<div class="content">
<div class="hero-button-wrapper" align="center">
	<table>
	<tr>		
	<td><a class="button button__bt" href="/online proctor/home/profile.php" ><font color="#FFFFFF">Student Profile</font></a></td>				
	<td><a class="button button__greenlight" href="/online proctor/home/sem.php"><font color="#FFFFFF">I/IV SEM1</font></a></td>
	<td><a class="button button__red" href="/online proctor/home/sem.php " ><font color="#FFFFFF">I/IV SEM2</font></a></td>
	</tr>
	<tr>				
	<td><a class="button button__pink" href="/online proctor/home/sem.php "><font color="#FFFFFF">II/IV SEM1</font></a></td>
	<td><a class="button button__orangelight" href="/online proctor/home/sem.php " ><font color="#FFFFFF">II/IV SEM2</font></a></td>			
	<td><a class="button button__pink1" href=" /online proctor/home/sem.php"><font color="#FFFFFF">III/IV SEM1</font></a></td>
	</tr>
	<tr>
	<td><a class="button button__green" href=" /online proctor/home/sem.php" ><font color="#FFFFFF">III/IV SEM2</font></a></td>				
	<td><a class="button button__crimson" href=" /online proctor/home/sem.php"><font color="#FFFFFF">IV/IV SEM1</font></a></td>
	<td><a class="button button__purple" href=" /online proctor/home/sem.php" ><font color="#FFFFFF">IV/IV SEM2</font></a></td>
	</tr>
	</table>
</div>
</div>


<div class="div1">
	<p>This site is Best Viewed at 1024 x 768 Resolution.</p>
</div>
</body>
</html>

