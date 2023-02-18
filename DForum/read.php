<?php
session_start();

if(!$_SESSION['user']){
	header('location:userlogin.php?error=login first for entry');
}

?>

<?php
// Variables
if(isset($_POST['submit'])){


$User = "root";
$Password = "";
$Database = "forum";
$Table = "thread";
$Host = "localhost";
$sqldate = date('Y-m-d H:i:s'); 
$idread = $_GET['readid'];
		// Connect to the server
	$con = 	mysqli_connect($Host, $User, $Password,$Database) or die (mysqli_error()); 
		//Check connectivity
		
	$replyer = $_SESSION['user'];

		$insert = "INSERT INTO reply (idthread,reply, user,replydate ) 
					  VALUES('$idread','$_POST[reply]','$replyer','$sqldate')";		

	if (!mysqli_query($con,$insert)){
	die("Error:".mysqli_error());
}
	

	}

?>
 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Nist college forum</title>
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="css/styles.css" type="text/css">	

<style>


.search input{ width:111px;border-right: none;border-radius:12px 0 0 12px ; }
.search button{ border-left:none;border-radius:0 12px 12px 0 ;}
.insert{ border-radius: 12px; }
.admincontent div{margin:11px 4px;}


.studentlist{clear: both;}

.studentlist table input , .studentlist table select{ background: white;padding:9px 22px; width:141px;border:none;}
.studentlist table  th{ text-align:left;background:#8ff; padding:9px 22px; width:151px; }
.studentlist table td{ background: white; }
.studentlist table td:hover{ background: #8ff; }
.studentlist table th:hover{ background: white; }
.studentlist table input:focus{ outline: none; }


.studentlist table select{   padding:12px 22px;width: 188px;}
.option{  color: blue; }

.sbutton button{ margin: 1px; border-radius:6px;cursor: pointer;  font-weight: bolder;padding:10px 24px;}
.center{ text-align: center;  font-family: sans-serif;font-variant: small-caps; }
.marginauto{ margin:auto; }
.center{ text-align: center; }

.user{ margin:33px; }
.thread{ margin: 33px; min-height: 156px;background:white; color: blue; font-weight: bold;padding: 22px; }

.whitebutton{ background: white;padding: 9px 22px; border:1px solid blue; width: 200px; text-align: center;}
.whitebutton:hover{ background:#aa2;border: none; }
.whitebutton a:hover{ color: white }

</style>

</head>
<body>




<div class="marginl">
	
		<div class="maintext"><hr>
			Forum Post Detail <hr>
		</div>

		<div class="greenbg">
<div class="whitebutton sphover fright"><a href="forum.php"> View All posts</a>
	

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
$reid = $_GET['readid'];


$sql = "SELECT * FROM thread where id='$reid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    $row1 = $result->fetch_assoc() 	;
    $user =$row1["user"];

$sql2 = "SELECT * FROM user where user='$user'";
$result2 = $con->query($sql2);
 $row2 = $result2->fetch_assoc();
     	echo "




<div class='insert sphover center'>
						Topic:".$row1["topic"]."
					</div>
		

			<div class='user fleft'>
			<img src='". $row2["image_path"] . $row2["image_name"] ."' alt='". $row2["image_name"] ."' width=170  height=200 >

			
			</div>
			<div class='thread'>

			<span style='font-size:small'>ished :".$row1["threaddate"]."</span>
			<br><br>
			".$row1["thread"]."
			</div>





     	";

     				
							} 


else {echo "<p>0 results</p>";}


?>

<br><br>
<?php



$sql3 = "SELECT * FROM reply where idthread='$reid'";
$result3 = $con->query($sql3);

if ($result3->num_rows > 0) {
     // output data of each row
    while($row3 = $result3->fetch_assoc()){
    $user =$row3["user"];

$sql4 = "SELECT * FROM user where user='$user'";
$result4 = $con->query($sql4);
 $row4= $result4->fetch_assoc();

     	echo "

     						<div class='user fleft'>
			<img src='". $row4["image_path"] . $row4["image_name"] ."' alt='". $row4["image_name"] ."' width=170  height=200 >

			
			</div>
			<div class='thread'>

			<span style='font-size:small'>Published :".$row3["replydate"]."</span>
			<br><br>
			".$row3["reply"]."
			</div>
			<br><br>



     	";

     			}
							} 





?>



<div class="studentlist marginauto" style="width: 77%;">

<table>
			<form method="post" action="read.php?readid=<?php echo $reid; ?>" >
		
			<tr><th colspan="4" style="text-align: center;"> Reply thread </th></tr>

			<tr><td colspan="4"><textarea rows="12" cols="111" name="reply" required></textarea></td></tr>


			</table> 

			<div class="sbutton"><center><button type="submit" name="submit" class="sphover"> Post Reply</button> <button class="sphover" type="reset">Reset</button></center></div>
			</form>
			</div>
</div>
		</div>	

</div>


	
	



		
	

</body>
</html>
