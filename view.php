<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Id</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Name</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email_Id</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Phone_Number</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Select_Course</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Additional_Comments</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Admin</th>
            <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Action</th>
          </tr>
          </tr>
        </thead>
        <tbody>
        <?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$config=require("./config.php");
$dp = require("./model/DB.php");

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->dbConnection();

$query = 'select * from Register_form';

$result = mysqli_query($conn, $query);

    ?>
          <tr>
         <?php while($user = mysqli_fetch_assoc($result)) : ?>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['Id'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['Name'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['Email_Id'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['Phone_Number'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['Select_Cource'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['Additional_Commends'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><?php echo $user['admin'] ?></td>
            <td class="py-4 px-6 border-b border-gray-200 text-sm"><button><a href="./controller/edit.process.php?id=<?php echo $user['Id']?>">edit</a></button> <button><a href="../controller/delete.process.php?id=<?php echo $user['Id']?>">delete</a></button></td>
          </tr>
          <!-- More rows here -->
          <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

</body>
</html>