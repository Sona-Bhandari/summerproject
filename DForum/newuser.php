 
 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Nist College</title>
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

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


	
       	

				
				

<div class="marginl" >
		<div class="maintext"><hr>
			 New User Registration <hr>
		</div>


		
		<div class="admincontent  marginauto">
			

			<div class="studentlist">
							
<?php
// Variables
if(isset($_POST['submit'])){
$User = "root";
$Password = "";
$Database = "forum";
$Table = "user";
$Host = "localhost";
$sqlDate = date('Y-m-d H:i:s'); 

		// Connect to the server
	$con = 	mysqli_connect($Host, $User, $Password,$Database) or die (mysqli_error()); 
		//Check connectivity
		



		$upload_image=$_FILES["myimage"]["name"];  //image name

		$folder="Photo/";  // folder name where image will be store
		move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
		// Insert data into DB
	
		$insert = "INSERT INTO $Table (user,password, Birth_Date, Email, Gender, Address ,Registration_Date,image_name,image_path ) 
					  VALUES('$_POST[user]','$_POST[password]','$_POST[dob]', '$_POST[email]', '$_POST[gender]', '$_POST[address]'
							,'$sqlDate','$upload_image','$folder')";		
		
	if (!mysqli_query($con,$insert)){
	die("Error:".mysqli_error());
}
	
else 
echo "<script>window.open('userlogin.php?msg=Account Created Successfully, Login Now','_self')</script>";	
	
		mysqli_close($con); 
	}
		
?>

	
					<div class='insert sphover center' id="errormsg">
						New Registration of user account
					</div>
			<table>
			<form method="post" action="newuser.php" enctype="multipart/form-data">
			<tr ><th>Name</th><td><input type="text" name="user" maxlength="50" required/></td>
				<th>Upload Image</th><td><input  type="file" name="myimage" required/></td></tr>

			<tr><th>Password</th><td><input type="password" name="password" id="pswd" required /></td>
			<th>Re-enter Password</th><td><input type="password" id="re" onchange="validate()"   required/></td></tr>
			
			<tr><th>Email</th><td><input type="email" name="email"  /></td>
			<th>Birth Date</th><td><input type="date" name="dob"  placeholder="MM/DD/YYYY" required/></td></tr>


			
			<tr><th>Registration Date</th><td><input type="text" id="date" name="reg_date" /></td><th>Gender</th><td>	
				<select name="gender">
					<option value="male">Male</option>
	<option value="female">Female</option>
	<option value="other">Other</option>
</select>
		<tr><th>Address</th><td colspan=3><input type="text" name="address" required  style="width: 535px;"  /></td></tr>

			</table> 

			<center><button class="sphover" type="submit" name="submit"> Register </button><button class="sphover" type="reset">Reset</button></center></div>
			</form>
			</div>

		</div>	


</div>
	<script type="text/javascript">
		
			function	validate(){

				var pswd=document.getElementById('pswd').value;
				var re = document.getElementById('re').value;
						
				var msg='New Registration of user account';

				if(pswd.length<6)
				{
						msg = 'Password length must be 6 or more!';
						document.getElementById('pswd').value='';
						document.getElementById('re').value='';
					}
				else if (pswd.localeCompare(re)!=0) {
					msg = 'Password does not match ! ';
					document.getElementById('pswd').value='';
						document.getElementById('re').value='';
				}

				document.getElementById('errormsg').innerHTML = msg;




			}

	</script>
	


</body>
</html>

<script>
var d = new Date();
document.getElementById("date").value = d.toDateString();
</script>

