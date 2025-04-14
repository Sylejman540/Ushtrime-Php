<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myfirstdatabase";


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed");
}

echo "Connected successfully";

