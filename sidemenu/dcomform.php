

 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>+2 Class NIST College</title>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="css/styles1.css" type="text/css">	
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<style>
.insert,.search input,.search button,.sidemenu ul li,.sbutton button{ background: white;padding: 9px 22px; border:1px solid blue;}
.maintext{ color:green; font-weight:bold;font-size:17pt;text-align:center;padding:13px;}
.marginl a{ color:blue;}
.sidemenu{ border:1px solid blue; border-right: none;border-radius:12px 0 0 0px ;padding:4px;padding-right:0;background:#aa2;width:220px;height:637px;}
.sidemenu ul{  list-style-type: none; }
.sidemenu ul li{border-right: none;border-radius:12px 0 0 12px ; margin: 22px 0; }
#selectedli{ background:#8ff; }
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



</style>

</head>
<body>
<!---------------------------header and fix sidebar-------------------------->


	

	
	


<div class="marginl" >
		<div class="maintext"><hr>
			+2 Class Database <hr>
		</div>


		

		<div class="admincontent fleft">
			<div>


					<div class="fleft insert sphover">
								 <a href="dcomform.php"><i class="fa fa-plus-circle fa-fw"></i> Insert New Record</a>
					</div>
					<div class="fleft insert sphover">
								 <a href="dcomview.php"><i class="fa fa-database fa-fw"></i> +2 Student Database</a>
					</div>
					<div class="search fright ">
						<form action="dcomsearch.php" method="GET">

							<input type="text" name="search" placeholder="Roll_no or Name" />
							<button type="submit" name="submit" value="Search" ><i class="fa fa-search"></i></button>
						</form>
					</div>

			</div>

			<div class="studentlist">
							
<?php
// Variables
if(isset($_POST['submit'])){
$User = "root";
$Password = "";
$Database = "fk";
$Table = "dcom";
$Host = "localhost";
$sqlDate = date('Y-m-d H:i:s'); 

		// Connect to the server
	$con = 	mysqli_connect($Host, $User, $Password,$Database) or die (mysqli_error()); 
		//Check connectivity
		



		$upload_image=$_FILES["myimage"]["name"];  //image name

		$folder="Photo/";  // folder name where image will be store
		move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
		// Insert data into DB
	
		$insert = "INSERT INTO $Table (roll_no,Student_Name, Father_Name, CNIC, Birth_Date,
										  Email, Gender, Address, City,
										  State,Matric_Course, Matric_Board,
										  Matric_Percentage,Matric_PassingOfYear ,
										  image_name ,image_path ,Registration_Date )
					  VALUES('$_POST[rollno]','$_POST[sname]', '$_POST[fname]', '$_POST[nic]', '$_POST[dob]'
							, '$_POST[email]', '$_POST[gender]', '$_POST[address]', '$_POST[city]'
							, '$_POST[state]', '$_POST[Matric_Course]', '$_POST[Matric_Board]'
							, '$_POST[Matric_Percentage]', '$_POST[Matric_PassingOfYear]'
							, '$upload_image','$folder','$sqlDate')";
	if (!mysqli_query($con,$insert)){
	die("Error:".mysqli_error());
}
else echo "<div class='insert'><center> <p >  Record Added Successfully  <br>";
	echo "Student name is:<strong>";
	echo $_POST['sname'];
	echo "</strong></p></center></div>";
	
		mysqli_close($con); 
	}
		
?>

	
					<div class='insert sphover center' id="error">
						+2 Addmision New Student
					</div>
			
			<form method="post" action="dcomform.php" enctype="multipart/form-data">
			<label>Student Name </label><input type="text" name="sname" maxlength="50" required/></td><br>
			<tr>
				<th>Upload Image</th><td><input  type="file" name="myimage" required/></td></tr>


			<label><tr><th>Father Name </label></th><td><input type="text" name="fname" maxlength="50"  required /></td>
			<th>Roll No</th><td> <input type="number" name="rollno" min='1' max='500'  onchange="check(this.value)" onblur ="check(this.value)" id="rollno" required /></td></tr><br>
						<label><tr><th>Class</label></th><td><input type="text" name="class"  disabled value="D.Com" /></td><br>
			<label><th>Cnic</label></th><td><input type="text" name="nic" maxlength="15" placeholder="3210312345671" /></td></tr><br>
			<label><tr><th>Email</label></th><td><input type="email" name="email"  id="email" onchange="checkemail(this.value)" onblur ="checkemail(this.value)"  /></td><br><hr></tr>
				<label>Gender</label><br>

Male<input  type="radio" name="gender" value="Male" checked="checked" />
<br>
Female<input  type="radio" name="gender" value="Female" />
<br> <hr>
			<label><th>Birth Date</label></th><td><input type="date" name="dob" id="bd" min="1990-01-01" max="2005-12-12" required/></td></tr><br>

			<label><tr><th>Registration Date</label></th><td><input type="text" id="date" name="reg_date" /><br>
				
			<th>State</th><td><input type="text" name="state" maxlength="30" required/></td></tr>
			<tr><th>Matric_Course</th><td><input type="text" name="Matric_Course" placeholder="Arts/Science" maxlength="30" required /></td>
				<th>Matric_Board</th><td><input type="text" name="Matric_Board" placeholder="Board Name" maxlength="30" required /></td></tr>
			<tr><th>Matric_Percentage</th><td><input type="text" name="Matric_Percentage" maxlength="30" placeholder=Percentage required/></td>
				<th>Matric_PassingOfYear</th><td><input type="text" name="Matric_PassingOfYear" maxlength="30" placeholder="Year Of Passing" required /></td></tr>
			
			<tr><th>Address</th><td colspan=3><input type="text" name="address" required  style="width: 535px;"  /></td></tr>

			 

			<div class="sbutton"><center><button class="sphover" type="submit" name="submit"> Register </button><button class="sphover" type="reset">Reset</button></center></div>
			</form>
			</div>

		</div>	


</div>
	
	

</body>
</html>

<script>
var d = new Date();
document.getElementById("date").value = d.toDateString();
</script>

<script type="text/javascript">
	function check(rollno){
	var flag;

	dom = document.getElementById('error').style;

if (rollno.length == 0) {dom.color="black";
					dom.fontSize="12pt";
					document.getElementById("error").innerHTML='Dcom Addmision New Student';
					return;}
else if(rollno>500){  return;}


else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                flag = xmlhttp.responseText;
            	if(flag==1){
            		document.getElementById("rollno").value="";
            		document.getElementById("rollno").focus();

            		dom.color="red";
            		dom.fontSize="14pt";
          			document.getElementById("error").innerHTML='Roll No already exist..!';

						}
				else{
					dom.color="black";
					dom.fontSize="12pt";
					document.getElementById("error").innerHTML='Dcom Addmision New Student';
				}
   
            }
        };
        xmlhttp.open("GET", "existing.php?rollno=" + rollno, true);
        xmlhttp.send();
    }
}
</script>


<script type="text/javascript">
	function checkemail(email){
	var flag;

	dom = document.getElementById('error').style;

if (email.length == 0) {  dom.color="black";
					dom.fontSize="12pt";
					document.getElementById("error").innerHTML='Dcom Addmision New Student';return;}

else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                flag = xmlhttp.responseText;
            	
            	if(flag==1){
            		document.getElementById("email").value="";
            		document.getElementById("email").focus();
            		dom.color="red";
            		dom.fontSize="14pt";
          			document.getElementById("error").innerHTML='Email already exist..!';

						}
				else{
					dom.color="black";
					dom.fontSize="12pt";
					document.getElementById("error").innerHTML='Dcom Addmision New Student';
				}
   
            }
        };
        xmlhttp.open("GET", "existing.php?email=" + email, true);
        xmlhttp.send();
    }
}
</script>