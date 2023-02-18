<?php
$conn = mysqli_connect("localhost", "root", "", "tests");
if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		@$Name = $_REQUEST['Name'];
		@$Address = $_REQUEST['Address'];
		@$Email = $_REQUEST['EMail'];
		@$Gender = $_REQUEST['Gender'];
		@$Telephone = $_REQUEST['Telephone'];
		@$Subject=$_REQUEST['Subject'];
		@$sql = "INSERT INTO form VALUES ('$Name',
			'$Address','$Email','$Gender','$Telephone','$Subject')";
			if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
			. " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 

                echo nl2br("\n$first_name\n $last_name\n "
                . "$gender\n $address\n $email");
			}
			else{

			
			echo "ERROR: Hush! Sorry $sql. "
			 . mysqli_error($conn);
				
				
		}
		
		// Close connection

		mysqli_close($conn);
		?>