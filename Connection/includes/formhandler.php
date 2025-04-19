<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    require_once 'dbh.php';

    $sql = "INSERT INTO users(name, surname, email) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_Param('sss', $name, $surname, $email);

    if($stmt->execute()){
        // echo "New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}