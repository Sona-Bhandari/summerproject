<?php
$host="localhost";
$user="root";
$pass="";
$db="tests";
$con=mysqli($host,$user,$pass,$db);
if(!$con){
	echo"there are problem";
}
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Password=$_POST['Password'];
$gender=$_POST['gender'];
$Email=$_POST['Email'];
//Database connection
$qry="INSERT INTO 'project'('FirstName','LastName','Password','gender','Email')
		VALUES('$FirstName','$LastName','$Password','$gender','$Email')";
$insert=mysql_query($con,$qry);
if(!$insert){
	echo"problem";

}
else{
echo"data insert ";
}
?>
