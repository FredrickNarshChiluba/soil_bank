<?php
 
$HostName = "localhost";
 
//database name
$DatabaseName = "esoildat_soil_data_banks";
 
// database username here.
$HostUser = "esoildat_bill";
 
//database password here.
$HostPass = "esoildat_soil_data_banks";
 $conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
// Populate Password from JSON $obj array and store into $password.
$code = $obj['code'];
$current_time=date("Y-m-d H:i:s");

if($code){
    $sql = "select * from copoun where code ='$code' AND expiry_date <'$current_time'";
 
$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
$SuccessLoginMsg = 'code';

 // Converting the message into JSON format.
$SuccessLoginJson = json_encode($SuccessLoginMsg);
 
// Echo the message.
 echo $SuccessLoginJson ;

 
} else {
    $SuccessLogin = 'copoun Already used.';

 // Converting the message into JSON format.
$SuccessLoginJ = json_encode($SuccessLogin);
 
// Echo the message.
 echo $SuccessLoginJ ;
 //echo "copoun Already used.";
}
 
}else{
    echo "field empty.";
}


$conn->close();
?>