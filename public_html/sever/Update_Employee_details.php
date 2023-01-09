<?php

$HostName = "localhost";
 
//database name
$DatabaseName = "esoildat_soil_data_banks";
 
// database username here.
$HostUser = "esoildat_bill";
 
//database password here.
$HostPass = "esoildat_soil_data_banks";

// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true); 
 
 // Populate employee id from JSON $obj array and store into $Employee_id.
 $Employee_id=$obj['id'];

 // Populate name from JSON $obj array and store into $name.
$name = $obj['name'];

// Populate email from JSON $obj array and store into $email.
$email = $obj['email'];

// Populate password from JSON $obj array and store into $password.
$password = password_hash($obj[password], PASSWORD_DEFAULT);

// Populate phone number from JSON $obj array and store into $phone_number.
$phone_number = $obj['Phone'];

// Populate address from JSON $obj array and store into $address.
$address = $obj['address'];
//DATE DATA SAVED
$created_at=date("Y-m-d H:i:s");
//DATE DATA UPDATED SAVED
$updated_at=date("Y-m-d H:i:s");

     // Creating SQL query and insert the record into MySQL database table.
$Sql_Query ="UPDATE users SET name= '$name', email = '$email', Phone = '$phone_number', address = '$address',updated_at='$updated_at' WHERE id = $Employee_id";
 
 if(mysqli_query($con,$Sql_Query)){
 
 // If the record updated successfully then show the message.
$MSG = 'Record Successfully updated' ;
 
// Converting the message into JSON format.
$json = json_encode($MSG);
 
// Echo the message.
 echo $json ;
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>

