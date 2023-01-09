<?php
 
// Importing DBConfig.php file.
include 'config_file.php';
 
// Creating connection.
 $con = new mysqli($host_name, $host_user, $host_password, $database_name);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
// Populate User email from JSON $obj array and store into $email.
$email = $obj['email'];
 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];
//Applying User Login query with email and password match.
$Sql_Query = "select * from users where email = '$email'";
 
// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
 
if (password_verify($password, $check['password'])) {
if(isset($check)){

    if($check['Role']==1)
 $SuccessLoginMsg = 'User';
 else
 $SuccessLoginMsg = 'Admin';

 
 // Converting the message into JSON format.
$SuccessLoginJson = json_encode($SuccessLoginMsg);
 
// Echo the message.
 echo $SuccessLoginJson ; 
 
 }
 
 else{
 
 // If the record inserted successfully then show the message.
$InvalidMSG = 'Invalid email or Password Please Try Again' ;
 
// Converting the message into JSON format.
$InvalidMSGJSon = json_encode($InvalidMSG);
 
// Echo the message.
 echo $InvalidMSGJSon ;
 
}
}else{
$InvalidMSG = 'Invalid  Password Please Try Again' ;
$InvalidMSGJSon = json_encode($InvalidMSG);

echo $InvalidMSGJSon ;

}
 
 mysqli_close($con);
?>