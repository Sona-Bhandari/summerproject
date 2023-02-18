

<?php
define('DB_NAME', 'fk');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

if(!$link){
		die("could not connect:" . mysqli_error());
}


if(!$db_selected){
			die("cant connect".DB_NAME.mysqli_error());
}

$sql = "INSERT INTO admission (sname, fname, nic, bday) VALUES('$_POST[sname]', '$_POST[fname]', '$_POST[nic]', '$_POST[dob]')";
if (!mysqli_query($con,$sql)){
	die("Error:".mysqli_error());
}
else echo " <p>Thanks by fk . your data is saved <a href='index.html'>click here to submit more data</a></p>";



mysqli_close($con);

?>