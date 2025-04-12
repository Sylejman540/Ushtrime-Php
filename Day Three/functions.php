<?php 

$string = "Hello World!";

echo str_replace("Hello", "Goodbye", $string);
echo "<br>";
echo strtolower($string);
echo "<br>";
echo strtoupper($string);

echo "<br>";

function helloWorld($name){
    return "Hello $name";
}

echo helloWorld("Sylejman");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="number" name="num1" placeholder="Enter your number">

    <select name="operator">
      <option value="add">+</option>
      <option value="subtract">-</option>
      <option value="multiply">*</option>
      <option value="divide">/</option>
    </select>

    <input type="number" name="num2" placeholder="Enter your number">

    <button type="submit">Calculate</button>
    </form>
    <?php 
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["operator"];

        switch($operator){
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                $result = $num1 / $num2;
                break;
            default:
                echo "Invalid operator";
        }

        echo "<h1>The result is $result</h1>";
       }else{
         echo "Please submit the form.";
       }
    ?>
</body>
</html>