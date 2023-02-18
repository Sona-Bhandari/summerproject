<?php
$conn = mysqli_connect("localhost", "root", "", "tests");
if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		$Name = $_POST['Name'];
		$Address = $_POST['Address'];
		
		$Gender = $_POST['Gender'];
		$Telephone = $_POST['Telephone'];
		$Subject=$_POST['Subject'];
		$sql = "INSERT INTO form VALUES ('$Name',
			'$Address','$Gender','$Telephone','$Subject')";
			if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
			. " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 

                
			}
			else{

			
			echo "ERROR: Hush! Sorry $sql. "
			 . mysqli_error($conn);
				
				
		}
		
		// Close connection

		mysqli_close($conn);
		?>