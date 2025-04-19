<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    
    try{
        
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // Error Handler
        $errors = [];

        if(is_input_empty($username, $password, $email)){
            $errors["empty_input"] = "Fill in all fields";
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken";
        }
        if(is_email_registred($pdo, $email)){
            $errors["email_used"] = "Email already registred";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signupData"] = $signupData;
            
            header("Location: ../index.php?error=signupfailed");
            die();
        }

        create_user($pdo, $email, $username, $password);

        header("Location: ../index.php?error=signupsuccess");

        $pdo = null;
        $stmt = null;

        die();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}else{
    header("Location: ../index.php");
    die();
}