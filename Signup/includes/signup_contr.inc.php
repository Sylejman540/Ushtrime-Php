<?php
declare(strict_types=1);


function is_input_empty(string $username, string $password, string $email){
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    }
    return false;
}

function is_email_invalid($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function is_username_taken(object $pdo,string $username){
    if (get_username($pdo, $username)) {
        return true;
    }
    return false;
}


function is_email_registred(object $pdo, string $email){
    if (get_email($pdo, $email)) {
        return true;
    }
    return false;
}   

function create_user(object $pdo, string $email, string $username, string $password){
    set_user($pdo, $email, $username, $password);
}