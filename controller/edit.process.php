
<?php

// session store
session_start();

// errorhandling
error_reporting(E_ALL);
ini_set('display_errors', 1);


$config=require("../config.php");
$dp = require("../model/DB.php");

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->dbConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['Id'])) {
    // $userId = intval($_GET['Id']); 
    $id = $_GET['id'];

    // Fetch user details
    $sqlQuery = "SELECT * FROM Register_form WHERE Id = $id";
    $result = mysqli_query($conn, $sqlQuery);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && isset($_POST['sumbit'])) {
    // $userId = intval($_POST['Id']);

    $id = $_GET['id'];
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phoneNo = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $courseName = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_SPECIAL_CHARS);
    $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);
    $isAdmin = isset($_POST['admin']) ? 1 : 0;

    // Update user details
    $sqlUpdate = "UPDATE Register_form SET Name = ?, Email_Id = ?, Phone_Number = ?, Select_Cource = ?, Additional_Commends = ? WHERE Id = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ssissi", $name, $email, $phoneNo, $courseName, $comments, $id);
    

    if ($stmt->execute()) {
        echo "User updated successfully.";
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error updating user.";
    }
}

// mysqli_close($conn);Additional_Comments

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>

<body class="bg-gray-100  min-h-screen">
    <?php 
    
    $id = $_GET['id'];
 
    $sqlQuery = "SELECT * FROM Register_form WHERE Id = $id";
    $result = mysqli_query($conn, $sqlQuery);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } 

    ?>
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md  mx-auto w-full">
        <h1 class="text-2xl font-bold mb-6 text-center">Course Register Form</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $user['Name'] ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Id</label>
                <input type="email" id="email" name="email" value="<?php echo $user['Email_Id'] ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $user['Phone_Number'] ?>"class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="course" class="block text-gray-700 font-semibold mb-2">Select Course</label>
                <select id="course" name="course" value="<?php echo $user['Select_Cource'] ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a course</option>
                    <option value="php">php</option>
                    <option value="Java script">Java script</option>
                    <option value="python">python</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="comments" class="block text-gray-700 font-semibold mb-2">Additional Comments</label>
                <textarea id="comments" name="comments" value="<?php echo $user['Additional_Commends'] ?>"class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label for="admin" class="block text-gray-700 font-bold mb-2">Admin:</label>
                <input type="checkbox" id="admin" name="admin" <?php echo $user['admin'] ? 'checked' : ''; ?> class="mr-2 leading-tight">
            </div>
            <div class="flex justify-center">
                <button type="submit" name = "sumbit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="btn">sumbit</button>
            </div>
        </form>
    </div>
</body>
</html>
