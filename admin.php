<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<header>
<?php require "view/practial/nav.header.php" ?> 
</header>
<main>
  <div class="container mx-auto p-6">
    <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-md">
      <h1 class="text-2xl font-bold text-gray-800">Welcome Admin</h1>

      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
       <a href="./view.php"> View All </a>
      </button>
    </div>
  </div>
  </main>
 

</body>
</html>
