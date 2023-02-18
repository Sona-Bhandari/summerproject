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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="../css/style.css" type="text/css">	

<style>
.insert,.search input,.search button,.sidemenu ul li,.sbutton button{ background: white;padding: 9px 22px; border:1px solid blue;}
.maintext{ color:green; font-weight:bold;font-size:17pt;text-align:center;padding:13px;}
.marginl a{ color:blue;}
.sidemenu{ border:1px solid blue; border-right: none;border-radius:12px 0 0 0px ;padding:4px;padding-right:0;background:#aa2;width:220px;height:637px;}
.sidemenu ul{  list-style-type: none; }
.sidemenu ul li{border-right: none;border-radius:12px 0 0 12px ; margin: 22px 0; }
#selectedli{ background:#8ff; }
#open{ margin-left: 9px; border-right-color: white; background:#8ff; }
.admincontent{ margin-left: 22px;  width:800px;  background:#aa2;padding: 14px; border:1px solid blue; border-left:none;border-radius:0 12px 0 0px }


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



</style>

</head>
<body>
<div class="admincontent  marginauto" style="margin-top: 22px;">
			<div class="studentlist">
							
<?php
// Variables
if(isset($_POST['submit'])){
$User = "root";
$Password = "";
$Database = "forum";
$Table = "thread";
$Host = "localhost";
$sqlDate = date('Y-m-d H:i:s'); 

		// Connect to the server
	$con = 	mysqli_connect($Host, $User, $Password,$Database) or die (mysqli_error()); 
		//Check connectivity
		

	$user = $_SESSION['user'];

		$insert = "INSERT INTO $Table (user,topic, thread,threaddate ) 
					  VALUES('$user','$_POST[topic]','$_POST[thread]','$sqlDate')";		
		
	if (!mysqli_query($con,$insert)){
	die("Error:".mysqli_error());
}
	
else 
echo "<script>window.open('forum.php?thread=thread posted','_self')</script>";	
	
		mysqli_close($con); 
	}
		
?>

	
					<div class='insert sphover center'>
						New Thread
					</div>
			<table>
			<form method="post" action="newthread.php" >
		
			<tr><th>Topic</th><td colspan=3><input type="text" name="topic" required  style="width: 535px;"  /></td></tr>
			<tr><th colspan="4" style="text-align: center;"> Write your Thread  </th></tr>
			<tr><td colspan=4><textarea name="thread" cols="111" rows="16" > </textarea></td></tr>

			</table> 
<div ><center><button class="sphover" type="submit" name="submit"> Post Thread</button><button class="sphover" type="reset">Reset</button></center></div>
			</center></div>
			</form>
</body>
</html>
