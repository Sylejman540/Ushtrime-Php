<?php
   require_once 'includes/config_session.inc.php';
   require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="includes/signup.inc.php" method="post">
        <?php signup_inputs(); ?>
        <button type="submit">Signup</button>
    </form>

    <?php check_signup_errors(); ?>
</body>
</html>