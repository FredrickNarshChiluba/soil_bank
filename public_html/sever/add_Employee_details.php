
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

//Role given
$role=1;

//check for email existance

$email_check="select * from users where email='{$email}'";
$queryEmail=mysqli_query($con,$email_check);
$count_email_rows=mysqli_num_rows($queryEmail);
 
if ($count_email_rows==1) {
    # code...
    // If the email used exists then show the message.
$MSG = 'email already registered' ;

// Converting the message into JSON format.
$json = json_encode($MSG);

// Echo the message.
echo $json ;
}else{
     // Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "insert into users (name,email,address,password,Phone,Role,created_at,updated_at)
						 values ('$name','$email','$address','$password', '$phone_number','$role','$created_at','$updated_at')";
 

if(mysqli_query($con,$Sql_Query)){

// If the record inserted successfully then show the message.
$MSG = 'account created Successfully' ;

// Converting the message into JSON format.
$json = json_encode($MSG);

// Echo the message.
echo $json ;

}
else{

echo 'Try Again';

}
}

 mysqli_close($con);
?>