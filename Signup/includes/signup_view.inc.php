<?php

declare(strict_types=1);

function signup_inputs() : void {
    if(isset($_SESSION["signupData"]["username"])){
        $u = htmlspecialchars($_SESSION["signupData"]["username"], ENT_QOUTES);
        echo "<input type=\"text\" name=\"username\" placeholder=\"Username\" value=\"{$u}\">";
    }else{
        echo '<input type="text" name="username" placeholder="Username" value="">';
    }

     // Password (never re‑populate a password field)
    echo '<input type="password" name="password"  placeholder="Password">';

    if(isset($_SESSION["signupData"]["email"])){
        $e = htmlsepcialchars($_SESSION["signupData"]["email"], END_QUOTES);
        echo "<input type=\"text\" name=\"email\" placeholder=\"Email\" value=\"{$e}\">";
    }else{
        echo '<input type="text" name="email" placeholder="Email" value="">';
    }
}

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach($errors as $error){
            echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
        }
        unset($_SESSION["errors_signup"]);
    }else if(isset($_GET["signup"]) &&  $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p class="form-success;">You have successfully signed up!</p>';
        }

    }