<?php

include 'config_file.php';

$message = '';

$connection = new mysqli($host_name, $host_user, $host_password, $database_name);

if ($connection->connect_error)
{
 die("Connection failed: " . $connection->connect_error);
} 

$json = json_decode(file_get_contents('php://input'), true);

$hashed_password = password_hash($json[password], PASSWORD_DEFAULT);
$created_at=date("Y-m-d H:i:s");
$query = "INSERT INTO users(name, email, address, password,Role,Phone,created_at) values('$json[name]', '$json[email]', '$json[address]', '$hashed_password','1','$json[phoneNumber]','$created_at')";

$query_result = $connection->query($query);

if ($query_result === true)
{
 $message = 'Registered suceessfully!';
}

else
{
 $message = 'Error! Try Again or email already exists';
}

echo json_encode($message);

$connection->close();