<?php
$conn = mysqli_connect("localhost","root","","tests") or die("Connection Failed");

$sql = "SELECT * FROM form";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


/*$row = mysqli_fetch_assoc($result);
print_r($row);
echo "</pre>";
foreach($row as $data) {
   echo  $data['Name'] ."". $data['Address']. "<br>";*/
   while ($row=mysqli_fetch_row($result)) {
   	echo $row[0]." ".$row['1']."<br>";
   
   
}


?>