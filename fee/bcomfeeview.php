<?php
error_reporting(0);
session_start();

if(!$_SESSION['user_name']){
	header('location:admin_login.php?error=login first then come');
}

?>
<?php
if(isset($_POST['update']))
{
	$con = mysqli_connect("localhost","root","",'fk');
	

	$updated			= $_POST['updated'];
	$edit 				= $_POST['editing'];
 

 //Get paidfee ammount from database
 $sql = "SELECT paidfee FROM bcom  WHERE sid=$edit  ";
$run = mysqli_query($con,$sql);

//now resourse id is returned just convert it to array
$row=mysqli_fetch_array($run);

//save result fk by accessing the only first elemnt in array
$result = $row[0]+$updated;

//now upload it to database

	$query1 = "UPDATE bcom SET paidfee='$result'	WHERE sid=$edit ";
	if(mysqli_query($con,$query1))
	{
		}
		else  echo mysqli_error();
	

}
	
	
	?>


 
 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>B.Com Fee Managment NIST College</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet"href="css/styles.css">
<link rel="stylesheet"href="css/styles1.css">
<header>
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


.studentlist{clear: both; font-family: sans-serif;}


.titlelist ul{list-style-type: none; display: inline; border-radius: 12px 12px 0 0;}
.titlelist ul li{ float:left; background: white;width:116px; padding: 9px 8px; border:1px solid blue;border-right: none;border-bottom:none;}
.titlelist ul li:first-child{ width:60px;border-radius: 12px 0 0 0; }
.titlelist ul li:last-child{ border-radius:0 12px 0 0 ;border-right:1px solid blue; }


.detaillist ul{ list-style-type: none;display:inline;  font-size:small;}
.detaillist ul li:hover{ background: #8ff; }
.detaillist ul li{ float: left;background: white;width:116px;max-width: 150px ;padding: 9px 8px;border-left:1px solid blue; margin-bottom: 3px;}
.detaillist ul li:first-child{width:60px;clear: both; }
.detaillist ul li:last-child{border-right: 1px solid blue; padding:0 8px;margin: 0}

.detaillist ul li input{ width: 70px; padding: 9px 8px;border:none;}
.detaillist ul li input:focus{ outline: none }
.detaillist ul li button{ padding:0;margin: 8px 0;border:none;background: white; cursor: url(../images/pointer.png) ,auto;}

.width200{ width: 200px; }
.pointer{ cursor: pointer; }
.insertbutton{ border: none;background: white }
.bold{ font-size: 12pt; }
.insertbutton:focus{ outline: none; }
</style>

</head>
<body>
<div class="marginl" >
		<div class="maintext" id="Error"><hr>
			B.com Fee Managment <hr>
		</div>


		<div class="sidemenu fleft">
			<ul>
				<li ><a href="feepanel.php"><i class="fa fa-user-circle fa-fw"></i>Fee Panel</a>    </li>
				<li id ="selectedli"><a href="dcomfeeview.php"><i class="fa fa-pencil fa-fw "></i> +2 Class Fee</a>    </li>	
				<li><a href="bcomfeeview.php"><i class="fa fa-book fa-fw"></i> B.com Class Fee</a>    </li>
				<li><a href="../index.php"><i class="fa fa-ban fa-fw"></i>Back to Home page</a>	</li>
	
	
			</ul>
		</div>

		<div class="admincontent fleft">
			<div>


					




					
			</div>
<center>
<div class="insert sans width200 marginauto sphover">
<form action="bcomfeeview.php" method="POST">	
<button type="submit" class="insertbutton pointer bold" name="reset"><i class="fa fa-refresh fa-fw fa-lg"></i>Reset All Fee</button>
</form>
</div>
			<div class="studentlist">
							<div class="titlelist">
								<ul>
									<li>RollNo</li>
									<li>Name</li>
									<li>Monthly </li>
									<li>Paid</li>
									<li>Remaining</li>
									<li> Update</li>
								</ul>

							</div>






<?php

$dbname = "fk";
$username = "root";
$password = "";
$servername = "localhost";
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
} 

$sql = "SELECT * FROM bcom";
$result = $con->query($sql);
$i=1;
$remaining=0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {	

   $editid=$row["sid"];
   $remaining=$row["monthlyfee"]- $row["paidfee"] ;
     										//if paidfee is zero then put icon as remove(not paid) else checked (paid fee)
     										$k=$row["paidfee"];
     										if($k==0){ $k="<i class='fa fa-remove'></i>";}
     										else     { $k="<i class='fa fa-check'></i>";}
     										//if remaining is zero than disable the next input
     										if($remaining==0)
     												$disabled="disabled";
     										else
     												$disabled="required";

     										

         echo " <div class='detaillist'>

								<ul >
									<li>". $row["roll_no"] ."</li>
									<li>". $row["student_name"] ."</li>
									<li>". $row["monthlyfee"]  ."</li>
									<li>	$k   </li>
									<li>". $remaining  ."</li>

									
										<li>
										<form action='bcomfeeview.php' method='post'>
										<input type='number'  name='updated'  max='".$row['monthlyfee']."' min='1' required/>
										<input type='hidden' name='editing' value='$edit'>

										<button  type='submit' name='update' class='fright'><i class='fa fa-plus-circle fa-lg '></i></button>
										</form>
										
									</li>
								</ul>

					</div>
				";

				$i++;

         
     									}
	
							} else {
   										  echo "<p>0 results</p>";
									}



?>
							

							
			</div>
</center>		
</body>
</html>
