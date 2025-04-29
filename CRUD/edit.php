<?php
// 1) Connect
$servername    = "localhost";
$username      = "root";
$password      = "";
$database      = "crud";

$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// 2) Initialize
$id = "";
$name   = "";
$surname = "";

// 3) GET vs POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // a) Must have an ID
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
    $id = $_GET['id'];

    // b) Fetch existing client
    $sql    = "SELECT * FROM users WHERE id = '$id'";
    $result = $connection->query($sql);
    $row    = $result ? $result->fetch_assoc() : null;

    if (!$row) {
        header("Location: index.php");
        exit;
    }

    // c) Populate form fields
    $name    = $row["name"];
    $surname   = $row["surname"];
    $location = $row["location"];

} else {
    // POST: process the submitted form
    $id      = $_POST["id"];
    $name    = $_POST["name"];
    $surname   = $_POST["surname"];
    $location = $_POST["location"];
    

    do {
        // 4) Validate
        if ( empty($id) || empty($name) || empty($surname) || empty($location)){
            $errorMessage = "All the fields are required";
            break;
        }

        // 5) Run the UPDATE
        $sql    = "UPDATE users " . "SET name = '$name', surname = '$surname', location = '$location'" . "WHERE id = $id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Client updated correctly";

        // 6) Redirect on success
        header("Location: index.php");
        exit;
    } while (false);
}

$errorMessage = "";
$successMessage = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Edit Client</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500 flex items-center justify-center p-4">
  <div class="bg-white bg-opacity-90 backdrop-blur-md rounded-2xl shadow-2xl p-8 max-w-md w-full">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Client</h1>

    <?php if($errorMessage): ?>
      <p class="mb-4 text-red-600 font-medium text-center"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>

    <form method="post" class="space-y-5">
      <!-- keep the ID hidden -->
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <div>
        <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
        <input id="name" name="name" type="text" value="<?= htmlspecialchars($name) ?>"
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition"/>
      </div>

      <div>
        <label for="surname" class="block text-gray-700 font-semibold mb-1">Surname</label>
        <input id="surname" name="surname" type="text" value="<?= htmlspecialchars($surname) ?>"
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition"/>
      </div>

      <div>
        <label for="location" class="block text-gray-700 font-semibold mb-1">Location</label>
        <input id="location" name="location" type="text" value="<?= htmlspecialchars($location) ?>"
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition"/>
      </div>

      <div class="flex space-x-4">
        <button type="submit"
                class="flex-1 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 transition">
          Update
        </button>
        <a href="index.php"
           class="flex-1 text-center py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition">
          Cancel
        </a>
      </div>
    </form>
  </div>
</body>
</html>
