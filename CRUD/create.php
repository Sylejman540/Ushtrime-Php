<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$surname = "";
$location = "";


$errorMessage = "";
$successMessage = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
  $name = $_GET["name"];
  $surname = $_GET["surname"];
  $location = $_GET["location"];
}
  do{  
    if(empty($name) || empty($surname) || empty($location)){
      $errorMessage = "You need to fill all input fields";
      break;

      $sql = "INSERT INTO users(name, surname, location) VALUES(?, ?, ?)";
      $result = $connection->query($sql);

      if(!$result){
        $errorMessage = "Invalid query";
        break;
      }

      $name = "";
      $surname = "";
      $location = "";

      $successMessage = "You have successfully added the user in the table";

      header("Location: index.php");
      exit;
    }

  }while(false)
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$surname = "";
$location = "";

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $name = $_POST["name"];
    $surname  = $_POST["surname"];
    $location = $_POST["location"];
 
    do{
        if (empty($name) || empty($surname) || empty($location)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Add new client to database...
        $sql = "INSERT INTO users(name, surname, location)" . "VALUES('$name', '$surname', '$location')";
        $result = $connection->query($sql);

        if(!$result){
          $errorMessage = "Inalid query: " . $connection->error;
          break;
        }

        $name = "";
        $surname = "";
        $location = "";

        $successMessage = "Client added correctly";

        header("Location: index.php");
        exit;
    } while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>New Client</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500 flex items-center justify-center p-4">
  <div class="bg-white bg-opacity-90 backdrop-blur-md rounded-2xl shadow-2xl p-8 max-w-md w-full">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">New Client</h1>

    <!-- Optional inline error/success messages -->
    <?php if($errorMessage): ?>
      <p class="mb-4 text-red-600 font-medium text-center"><?php echo htmlspecialchars($errorMessage); ?></p>
    <?php elseif($successMessage): ?>
      <p class="mb-4 text-green-600 font-medium text-center"><?php echo htmlspecialchars($successMessage); ?></p>
    <?php endif; ?>

    <form method="post" class="space-y-5">
      <div>
          <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
          <input id="name" name="name" type="text" value="<?php echo htmlspecialchars($name); ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition"/>
      </div>
      <div>
          <label for="surname" class="block text-gray-700 font-semibold mb-1">Surname</label>
          <input id="surname" name="surname" type="text" value="<?php echo htmlspecialchars($surname); ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition"/>
      </div>
      <div>
          <label for="location" class="block text-gray-700 font-semibold mb-1">Location</label>
          <input id="location" name="location" type="text" value="<?php echo htmlspecialchars($location); ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition"/>
      </div>
      <div class="flex space-x-4">
          <button type="submit" class="flex-1 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 transition">Submit</button>
          <a href="index.php" class="flex-1 text-center py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
