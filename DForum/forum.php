<?php
session_start();

if(!$_SESSION['user']){
	header('location:userlogin.php?error=login first for entry');
}

?>
 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Nist college forum</title>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="../css/style.css" type="text/css">	

<style>
.insert,.search input,.search button,.sidemenu ul li{ background: white;padding: 9px 22px; border:1px solid blue;}
.maintext{ color:green; font-weight:bold;font-size:17pt;text-align:center;padding:13px;}
.marginl a{ color:blue;}
.sidemenu{ border:1px solid blue; border-right: none;border-radius:12px 0 0 0px ;padding:4px;padding-right:0;background:#aa2;width:240px;height:400px;}
.sidemenu ul{  list-style-type: none; }
.sidemenu ul li{border-right: none;border-radius:12px 0 0 12px ; margin: 22px 0; }
#selectedli{ background:#8ff;}
#open{ margin-left: 9px; border-right-color: white; background:#8ff; }
.admincontent{ margin-left: 22px;  width:800px;min-height:  380px; background:#aa2;padding: 14px; border:1px solid blue; border-left:none;border-radius:0 12px 0 0px }


.search input{ width:111px;border-right: none;border-radius:12px 0 0 12px ; }
.search button{ border-left:none;border-radius:0 12px 12px 0 ;}
.insert{ border-radius: 12px; }
.admincontent div{margin:11px 4px;}


.studentlist{clear: both; font-family: sans-serif; width: 97%; margin: auto;}


.titlelist ul{list-style-type: none; display: inline; border-radius: 12px 12px 0 0;}
.titlelist ul li{ float:left; background: white;width:216px; padding: 9px 8px; border:1px solid blue;border-right: none;border-bottom:none;}
.titlelist ul li:first-child{ width:60px;border-radius: 12px 0 0 0; }
.titlelist ul li:last-child{ border-radius:0 12px 0 0 ;border-right:1px solid blue; }


.detaillist ul{ list-style-type: none;display:inline;  font-size:small;}
.detaillist ul li:hover{ background: #8ff; }
.detaillist ul li{ float: left;background: white;width:216px; ;padding: 9px 8px;border-left:1px solid blue; margin-bottom: 3px;}
.detaillist  ul li a{ padding: 9px 22px; }
.detaillist ul li:first-child{width:60px;clear: both; }
.detaillist ul li:last-child{border-right: 1px solid blue; margin: 0}

.detaillist ul li input{ width: 70px; padding: 9px 8px;border:none;}
.detaillist ul li input:focus{ outline: none }
.detaillist ul li button{ padding:0;margin: 8px 0;border:none;background: white; cursor: url(../images/pointer.png) ,auto;}

.whitebutton{ background: white;padding: 9px 22px; border:1px solid blue; width: 200px; text-align: center;}
.whitebutton:hover{ background:#aa2;border: none; }
.whitebutton a:hover{ color: white }
.marginauto{ margin: auto; }
.topic { margin-top: 55px; }

</style>

</head>
<body>


	
	


<div class="marginl" >
		<div class="maintext"><hr>
			NIST Forum <hr>
		</div>


		
		<div class="greenbg sphover fright ">
				

					<a href="newthread.php"> Post New Thread</a>
				</div>




				<div class="topic">



<div class="studentlist ">
							<div class="titlelist">
								<ul>
									<li>Sr.No</li>
									<li>Posted By</li>
									<li id="sp">Topic </li>
									<li>Publish Date</li>
									<li>Read full</li>
									
								</ul>

							</div>

					


<?php

$dbname = "forum";
$username = "root";
$password = "";
$servername = "localhost";
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
} 

$sql = "SELECT * FROM thread";
$result = $con->query($sql);
$i=1;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {	

     	$readid =$row['id'];

         
  			echo "<div class='detaillist'>
  					<ul>
  						<li>".$i."</li>
  						<li> ".$row['user']." </li>
  						 <li id='sp'>".$row['topic']." </li>
  						 <li>".$row['threaddate']." </li>
  						 <li> <a href='read.php?readid=".$readid."'>Read Thread</a></li>
  					</ul>
  						 </div>
  							";   	

     									$i++;}
					}
 else {echo "<p>0 results</p>";}



?>

</body>
</html>
