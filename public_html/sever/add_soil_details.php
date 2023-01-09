<?php

include 'config_file.php';

$message = '';

$connection = new mysqli($host_name, $host_user, $host_password, $database_name);

if ($connection->connect_error)
{
 die("Connection failed: " . $connection->connect_error);
} 

$json = json_decode(file_get_contents('php://input'), true);

// $hashed_password = password_hash($json[password], PASSWORD_DEFAULT);
$created_at=date("Y-m-d H:i:s");
$query = "INSERT INTO  nutrients(Soil_typ, Soil_texture, Organic_Carbon, Soil_php,Nitrogen,Phosphorus,Potassium,Cation_Exchange_Capacity,field_name,Land_size,field_unit,land_location_cordinates,farmer_name,farmer_email,farmer_address,farmer_contact,created_at) values('$json[soil_type]', '$json[soil_texture]', '$json[soil_organic]','$json[soil_php]','$json[soil_nitrogen]','$json[soil_phosphorus]','$json[soil_potassium]','$json[soil_cation]','$json[field_name]','$json[land_size]','$json[field_unit]','$json[land_coords]','$json[farmer_name]','$json[farmer_email]','$json[farmer_address]','$json[farmer_contact]','$created_at')";

$query_result = $connection->query($query);

if ($query_result === true)
{
 $message = 'Added suceessfully!';
}

else
{
    // echo "Error: " . $sql . "<br>" . $connection->error;
 $message = $connection->error;
}

echo json_encode($message);

$connection->close();