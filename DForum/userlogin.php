<?php

session_start();

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Login Nist College</title>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="css/styles1.css" type="text/css">	

<style>
.select a{color:yellow;}
.headtext{ width:auto;}
#open{ margin-left: 9px; border-right-color: white; background:#8ff; }
 
.con{  
	border: 2px solid black;
	border-top:none;}
form {	
	color: #099;
	text-align: center;
}

input[type=text], input[type=password] {
	width: 22%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	text-align: center;
}

#button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 158px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 27%;
}
#button:hover{ background:green;}




.imgcontainer {
    text-align: center;
	padding:6px;
    margin: 0 0 12px  0;
}

img.avatar {
    width: 20%;
    border-radius: 40%;
}

.container {
    padding: 16px;
	
}



span.psw {
        padding-top: 16px;
		left: 222px;
		}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    
}


</style>

</head>
<body>



	
	

<div class="hell">
	<div class="headtext marginl sphover">
			User Login
					</div>
<div class="marginl con">
<form action='userlogin.php' method='POST'>
  <div class="imgcontainer">
    <img src="images/uniform.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username"  name="user_name" required>
<br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="user_pass" required>
<br>        
    <input id="button" type="submit" name="login" value="Login" />
  </div>
<center>
<div id="wrong" style="color:red;font-weight:bold"></div>
<?php if(isset($_GET['error'])){echo $_GET['error']; }?>  
</center>
</form>
</div>

</div>

        	 
	
<?php

$con = mysqli_connect("localhost","root","",'forum');
		
if(isset($_POST['login']))
{
	$username = $_SESSION['user'] = $_POST['user_name'];
	$password = $_POST['user_pass'];

$query = "select * from user where user='$username' AND password='$password'";
$run = mysqli_query($con,$query);

if(mysqli_num_rows($run)>0)
{
	echo "<script>window.open('forum.php?logged=logged in successfully','_self')</script>";	
}
else{
echo "<script>document.getElementById('wrong').innerHTML='".$_POST['user_name']." You have Incorrect user name or password Retry...!';</script>";
}
	
}



?>

</body>
</html>















