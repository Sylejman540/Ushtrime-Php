<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Cool CRUD Form</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500 p-4">
<div class="flex items-center justify-center">

    <div class="bg-white bg-opacity-90 backdrop-blur-md rounded-2xl shadow-2xl p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Join Our Community</h2>
    </div>
</div>


<div class="overflow-x-auto bg-white bg-opacity-90 backdrop-blur-md rounded-2xl shadow-lg mt-8 p-4">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
        <span class='inline-block px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded transition mb-5'><a href="create.php">Create</a></span> 
          <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Surname</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Location</th>
            <th class="px-6 py-3"></th>
            <th class="px-6 py-3"></th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "crud";

          $connection = new mysqli($servername, $username, $password, $database);
          if($connection->connect_error){
            die("Invalid query" . $connection->error);
          }
          
          $sql = "SELECT * FROM users";
          $result = $connection->query($sql);

          if(!$result){
            die("Invalid Query" . $connection->error);
          }

          while($row = $result->fetch_assoc()){
            echo "
            <tr class='hover:bg-gray-50 transition'>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-700'>{$row['id']}</td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-700'>{$row['name']}</td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-700'>{$row['surname']}</td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-700'>{$row['location']}</td>
              <td class='px-6 py-4 whitespace-nowrap'>
                <a
                  href='edit.php?id={$row['id']}'
                  class='inline-block px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded transition'
                >Edit</a>
              </td>
              <td class='px-6 py-4 whitespace-nowrap'>
                <a
                  href='delete.php?id={$row['id']}'
                  class='inline-block px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded transition'
                >Delete</a>
              </td>
            </tr>";
        }
        ?>
        </tbody>
      </table>
    </div>



</body>
</html>
