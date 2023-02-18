<?php
session_start();

if(!$_SESSION['user_name']){
	header('location:admin_login.php?error=login first then come');
}

?>
 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title> NIST Collage</title>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style1.css" type="text/css">	
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>	

<style>
.sidebar{
	position: fixed;
	left: 0;
	width:250px;
	height: 100%;
	background:#042331;
}
.sidebar header{
	font-size: 22px;
	color:white;
	text-align: center;
	line-height: 65px;
}
.sidebar ul{ list-style-type: none;  padding: 0;}
.sidebar ul li{ background:url(../images/bg-body.jpg);;border:1px solid blue;padding: 11px 0 11px 11px;  margin:11px 0;border-radius: 22px 0 0 22px; }
.sidebar ul li:hover{ cursor: auto;border-right-color: white; margin-left: 7px;}
.sidebar ul li a{ color:blue; }
.sidebar ul li a:hover{ color: black; }

#open a{ color:black; }
#open{ margin-left: 9px; border-right-color: white;background:#8ff }



.maintext{ color:green; font-weight:bold;font-size:17pt;text-align:center;padding:13px;}
.marginl a{ color:blue;}
.sidemenu{ border:1px solid blue; border-right: none;border-radius:12px 0 0 0px ;padding:4px;padding-right:0;background:#aa2;width:220px;height:400px;}
.sidemenu ul{ list-style-type: none; }
.sidemenu ul li{border:1px solid blue;border-right: none;border-radius:12px 0 0 12px ; margin: 22px 0;  ;padding:9px 22px; background: white;}
#selectedli{ background:#8ff; }

.admincontent{ margin-left: 22px;  width:930px;min-height:  380px; background:#aa2;padding: 14px; border:1px solid blue; border-left:none;border-radius:0 12px 0 0px }


.search input{ width:111px;border-right: none;border-radius:12px 0 0 12px ; }
.search button{ border-left:none;border-radius:0 12px 12px 0 ;}
.insert{ border-radius: 12px; }
.admincontent div{margin:11px 4px;}


.studentlist{clear: both; font-family: sans-serif;}


.titlelist ul{list-style-type: none; display: inline; border-radius: 12px 12px 0 0;}
.titlelist ul li{ float:left; background: white;width:140px; padding: 9px 8px; border:1px solid blue;border-right: none;border-bottom:none;}
.titlelist ul li:first-child{ width:50px;border-radius: 12px 0 0 0; }
.titlelist ul li:last-child{ border-radius:0 12px 0 0 ;border-right:1px solid blue; }


.detaillist ul{ list-style-type: none;display:inline;  font-size:small;}
.detaillist ul li:hover{ background: #8ff; }
.detaillist ul li{ float: left;background: white;width:140px;max-width: 150px ;padding: 9px 8px;border-left:1px solid blue; margin-bottom: 3px;}
.detaillist ul li:first-child{width:50px;clear: both; }
.detaillist ul li:last-child{border-right: 1px solid blue;}


</style>

</head>


	<body>
		<div class="sidebar">	


				<ul >
					
					<li><a href="../accounts/admin_login.php"><i class="fa fa-ellipsis-v fa-fw "></i>Student Data Base</a></li>
					<li ><a href="../managment/managmentpanel.php"><i class="fa fa-ellipsis-v fa-fw "></i></i>Staff Data Base</a></li>
					<li  ><a href="../fee/feepanel.php"><i class="fa fa-ellipsis-v fa-fw "></i>Fee Data Base</a></li>
					
					<li id="open"><a href="../accounts/accountpanel.php"><i class="fa fa-ellipsis-v fa-fw "></i> Accounts DataBase</a></li>
					<li><a href="../DForum/form.php"><i class="fa fa-ellipsis-v fa-fw "></i>Discussion Forum</a></li>
				</ul>
	
</div>

<div class="marginl" >
		<div class="maintext"><hr>
			All user accounts <hr>
		</div>


		<div class="admincontent " style="margin: auto;">
			<div>


					<div class="fleft insert sphover">
								 <a href="accounts/form.php"><i class="fa fa-plus-circle fa-fw"></i> Visit form</a>
					</div>

					<?php 

					

					if(isset($_GET['updated'])){
					echo "<div class='fleft insert sphover'><i class='fa fa-check fa-fw fa-lg'></i>
							".$_GET['updated']."
					</div>";
					}

					?>
					
					<?php 

					

					if(isset($_GET['deleted'])){
					echo "<div class='fleft insert sphover'><i class='fa fa-check fa-fw'></i>
							".$_GET['deleted']."
					</div>";
					}

					?>



					
			</div>
<center>
			<div class="studentlist">
							<div class="titlelist">
								<ul>
									<li>Sr.no</li>
									<li>User Name</li>
									<li>Password</li>
									<li>Email </li>
									<li> Gender</li>
									<li> Modify</li>
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

$sql = "SELECT * FROM user";
$result = $con->query($sql);
$i=1;

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {	$del=$row["uid"]; $edit=$row["uid"];


         echo " <div class='detaillist'>

								<ul >
									<li>".$i."</li>
									<li>". $row["user"] ."</li>
									<li>". $row["password"]  ."</li>
									<li>". $row["Email"]  ."</li>
									<li>". $row["Gender"]  ."</li>

									<li>
										
										<a href='accdelete.php?del=$del'><i class='fa fa-remove fa-lg fa-fw'> </i>Remove</a>
										
									</li>
								</ul>

					</div>
				";
				$i++;

         
     									}
	
							} else {
   										  echo "<p>0 results</p>";
									}

$con->close();

?>
							

							
			</div>
</center>		

	
	
	


</body>
</html>
