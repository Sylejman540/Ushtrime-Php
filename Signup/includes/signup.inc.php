<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try{

        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // Error Handling

        $errors = [];

        if(is_input_empty($username, $email, $password)){
            $errors["input_invalid"] = "Input cannot be empty!";
        }

        if(is_email_invalid($email)){
            $errors["email_invalid"] = "Email is invalid!";
        }

        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username is already taken!";
        }

        if(is_email_registred($pdo, $email)){
            $errors["email_registred"] = "Email is already registred!";
        }

        require_once "config_session.inc.php";

        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData  = [
                "username " => $username,
                "email" => $email
            ];

            $_SESSION["signupData"] = $signupData;
            header("Location: ../index.php?error=signupfailed");
            exit();
        }

        create_user($pdo, $username, $email, $password);

        header("Location: ../index.php?signup=success");
        $pdo = null;
        $statement = null;
        die();

    }catch(PDOExpection $e){
        echo "Error: " . $e->getMessage();
        die();
    }
}else{
    header("Location: ../index.php?error=invalidrequest");
    exit();
}