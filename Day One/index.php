<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Variable: Memory Location That Stores Data-->
    <?php 
    $name = "John Doe";
    echo $name;
    ?>

    <!-- Data Types: Scalar Types, Arrays, Objects -->

    <?php
    // Scalar Types
    $string = "Daniel";
    $int = 12345;
    $float = 123.45;
    $bool = true;
    ?>

    <?php
    // Arrays
    $array = array("Banana", "Apple", "Orange");

    // Objects
    // $object = new Car();
    ?>

    <!-- Example For Day One -->
    <?php
       $name = "Sylejman Durguti";
    ?>

    <p>My name is <?php echo $name; ?>, I'am a frontend dev looking forward to backend</p>

    <!-- Variables are a memory location that holds data or stores them, variables in PHP are assigned with dollar sign. We have a lot of data type in php
    like: scalar types, arrays, objects. -->

    <!-- Built-In Superglobal Variables -->
    <?php
    // echo $_SERVER['PHP_SELF'];
    // echo $_SERVER['SERVER_NAME'];
    // echo $_SERVER['SCRIPT_NAME'];

    echo $_GET['name'];
    ?>
</body>
</html>