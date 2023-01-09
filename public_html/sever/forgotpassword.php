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

$query = "UPDATE users SET password= '$hashed_password' WHERE email = '$json[email]'";


$query_result = $connection->query($query);

if ($query_result === true)
{
 $message = 'password changed suceessfully!';
}

else
{
 $message = 'Error! Incorrect email.';
}

echo json_encode($message);

$connection->close();