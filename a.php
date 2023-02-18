<?php

$con = mysqli_connect("localhost","root","",'fk');

    
if(isset($_POST['login']))
{
  $username = $_SESSION['user_name'] = $_POST['user_name'];
  $password = $_POST['admin_pass'];

$query = "select * from login where user_name='$username' AND user_password='$password'";
$run = mysqli_query($con,$query);

if(mysqli_num_rows($run)>0)
{
  echo "<script>window.open('adminpanel.php?logged=logged in successfully','_self')</script>";  
}
else{
echo "<script>document.getElementById('wrong').innerHTML='".$_POST['user_name']." You have Incorrect user name or password Retry...!';</script>";
}
  
}



?>
