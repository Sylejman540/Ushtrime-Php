<?php

$dbHost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'myfirstdatabase';

$conn = new mysqli($dbHost, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
    echo "Connection failed: " . $conn->connect_error;
    exit();
}
// echo "Connected successfully"; // Uncomment for debugging

