
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Login Nist College</title>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="css/styles1.css" type="text/css">	

<style>
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
    text-align: left;
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
			Login Form
					</div>
<div class="marginl con">
<form action='admin_login.php' method='POST'>
  <div class="imgcontainer">
    <img src="image/New.jpeg" width="30%"height="40%"alt="Avatar" class="Avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username"  name="user_name" required>
<br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="user_password" required>
<br>        
    <input id="button" type="submit" name="login" value="login" />
  </div>
<center>
<div id="wrong" style="color:red;font-weight:bold"></div>
<?php if(isset($_GET['error'])){echo $_GET['error']; }?>  
</center>
<?php

$con = mysqli_connect("localhost","root","",'fk');

    
if(isset($_POST['login']))
{
  $username = $_SESSION['user_name'] = $_POST['user_name'];
  $password =$_SESSION['user_password']= $_POST['user_password'];

$query = "select * from login where user_name='$username' AND user_password='$password'";
$run = mysqli_query($con,$query);

if(mysqli_num_rows($run)>0)
{
  echo "<script>window.open('admin_panel.php?logged=logged in successfully','_self')</script>";  
}
else{
echo "<script>document.getElementById('wrong').innerHTML='".$_POST['user_name']." You have Incorrect user name or password Retry...!';</script>";
}
  
}



?>

	

</body>
</html>















