<?php
declare(strict_types=1);

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 0, // Session cookie
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true, // Only send over HTTPS
    'httponly' => true, // Prevent JavaScript access
]);

session_start();

if (!isset($_SESSION["last_regeneration"])) {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
} else {
    $interval = 60 * 30;                       // 30 minutes
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        session_regenerate_id();
        $_SESSION["last_regeneration"] = time();
    }
}

function regenerate_session_id(){
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}