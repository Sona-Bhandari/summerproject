<?php
$nameErr="";
$addressErr="";
$genderErr="";
$telephoneErr="";
$subjectErr="";
if(isset($_POST['submit'])){
	if(empty($_POST['Name'])){
		$nameErr="*Name cannot be empty";
	}
	if(empty($_POST['Address'])){
		$addressErr="*Address cannot be empty";

	}
	if(empty($_POST['Gender'])){
		$genderErr="*Gender cannot be empty";

}
if(empty($_POST['Telephone'])){
$telephoneErr="*Telephone cannot be Empty"	;
}
elseif(empty($_POST['Subject'])){
	$subjectErr="*subject cannot be Empty";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action=""method="post"> 
      
      <p>Name: <input type="text"
              size="65" name="Name" /><?php echo $nameErr; ?></p>
      <br />
      <p>Address: <input type="text"
              size="65" name="Address" /><?php echo $addressErr; ?>
    </p>
      
      <p>Gender: <input type="text"
            size="65" name="Gender" /><?php echo $genderErr ;?></p>
      <br />
      <p>Telephone: <input type="text"
            size="65" name="Telephone" /><?php echo $telephoneErr; ?></p>
      <br />

      <p>
        SELECT YOUR COURSE
        <select type="text" value="" name="Subject"><?php echo $subjectErr ?>
          <option></option>
          <option>BBA</option>
          <option>BCA</option>
          <option>B.COM</option>
          <option>BIM</option>
        </select>
      </p>
      <br />
      <br />
      
      <p>
        <input type="submit"
           name="Submit" />
        <input type="reset"
          value="Reset" name="Reset" />
      </p>
    </form>
</body>
</html>