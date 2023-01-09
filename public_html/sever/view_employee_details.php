<?php
$HostName = "localhost";
 
//database name
$DatabaseName = "esoildat_soil_data_banks";
 
// database username here.
$HostUser = "esoildat_bill";
 
//database password here.
$HostPass = "esoildat_soil_data_banks";
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
// fetch all records from user Table.
$role=0;
$sql = "SELECT * FROM users where Role='{$role}'";
 
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