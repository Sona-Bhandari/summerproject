

 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Bachelors Class NIST College</title>
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

<div class="marginl" >
		<div class="maintext"><hr>
			Bachelor Class Database <hr>
		</div>


		

		<div class="admincontent fleft">
			<div>


					<div class="fleft insert sphover">
								 <a href="bcomform.php"><i class="fa fa-plus-circle fa-fw"></i> Insert New Record</a>
					</div>
					<div class="fleft insert sphover">
								 <a href="bcomview.php"><i class="fa fa-database fa-fw"></i> Bachelors Student Database</a>
					</div>
					<li><a href="index.php"><<i class="fa fa-home" aria-hidden="true"></i> Back to home page</a>	</li>
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
$Table = "bcom";
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
										  State, Matric_Course, Matric_Board,
										  Matric_Percentage,Matric_PassingOfYear , inter_course,
										  inter_board,inter_percentage,inter_year,
										  image_name ,image_path ,Registration_Date ) 
					  VALUES('$_POST[rollno]','$_POST[sname]', '$_POST[fname]', '$_POST[nic]', '$_POST[dob]'
							, '$_POST[email]', '$_POST[gender]', '$_POST[address]', '$_POST[city]'
							, '$_POST[state]', '$_POST[Matric_Course]', '$_POST[Matric_Board]'
							, '$_POST[Matric_Percentage]', '$_POST[Matric_PassingOfYear]','$_POST[inter_course]'
							, '$_POST[inter_board]','$_POST[inter_percentage]','$_POST[inter_year]'
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
						Bachelors Addmision New Student
					</div>
			
			<form method="post" action="bcomform.php" enctype="multipart/form-data">
			<label>Student Name </label><input type="text" name="sname" maxlength="50" required/></td><br>
			<tr>
				<th>Upload Image</th><td><input  type="file" name="myimage" required/></td></tr>


			<label><tr><th>Father Name </label></th><td><input type="text" name="fname" maxlength="50"  required /></td>
			<th>Roll No</th><td> <input type="number" name="rollno" min='1' max='500'  onchange="check(this.value)" onblur ="check(this.value)" id="rollno" required /></td></tr><br>
			<label><tr><th>Class</label></th><td><input type="text" name="class"  disabled value="D.Com" /></td><br>
			<label><th>Cnic</label></th><td><input type="text" name="nic" maxlength="15" placeholder="3210312345671" /></td></tr><br>
			<label>Email</label><input type="email" name="email"  />
<br><hr>
<label>Gender</label><br>

Male<input  type="radio" name="gender" value="Male" checked="checked" />
<br>
Female<input  type="radio" name="gender" value="Female" />
<br> <hr>
<label> Address</label><textarea name="address" rows="4" cols="50"></textarea>
<br><hr>
<label>City</label></label><input type="text" name="state" maxlength="30" required/>
<br><hr>
<label>State</label><input type="text" name="state" maxlength="30" required/>
<br><hr>

<label>Qualification</label>


 <br>
<label>1-Matric</label>

<input type="text" name="Matric_Course" placeholder="Arts/Science" maxlength="30" required /><br><br>
<input type="text" name="Matric_Board" placeholder="Board Name" maxlength="30" required /><br><br>
<input type="text" name="Matric_Percentage" maxlength="30" placeholder=Percentage required/><br><br>
<input type="text" name="Matric_PassingOfYear" maxlength="30" placeholder="Year Of Passing" required />
<br><hr>
<label>2-Intermediate</label>

<input type="text" name="inter_course" placeholder="fsc/F.A" maxlength="30" required /><br><br>
<input type="text" name="inter_board" placeholder="Board/University/clg" maxlength="30" required /><br><br>
<input type="text" name="inter_percentage" maxlength="30" placeholder=Percentage required/><br><br>
<input type="text" name="inter_year" maxlength="30" placeholder="Year Of Passing" required />
				
<br><hr>

</div>
<br><br>

<div class="bttn"><input type="submit" name="submit" value="Register"/>
<input  type="reset" value="Reset"/></div>
</div>
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
					document.getElementById("error").innerHTML='Bachelors Addmision New Student';
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
					document.getElementById("error").innerHTML='Bachelors Addmision New Student';
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
					document.getElementById("error").innerHTML='Bachelors Addmision New Student';return;}

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
					document.getElementById("error").innerHTML='Bachelors Addmision New Student';
				}
   
            }
        };
        xmlhttp.open("GET", "existing.php?email=" + email, true);
        xmlhttp.send();
    }
}
</script>