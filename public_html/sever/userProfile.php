
<?php

$HostName = "localhost";
 
//database name
$DatabaseName = "esoildat_soil_data_banks";
 
// database username here.
$HostUser = "esoildat_bill";
 
//database password here.
$HostPass = "esoildat_soil_data_banks";

// Creating connection.
 $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 // if ($con ) {
 // 	# code...
 // 	$mess = 'db connected';
 // 	echo json_encode($mess);
 // }
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
// Populate User username from JSON $obj array and store into $username.
// $username = $obj['username'];
$email = 'mugisa@gmail.com';
 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];

$sql = "select * from users where  email = '$email'";
 
$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>