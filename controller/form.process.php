<!-- <?php

// session store
session_start();

// errorhandling
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config=require("../config.php");
$dp = require("../model/DB.php");

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->dbConnection();

// check if the user clicked submit btn
if (isset($_POST['Register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $comments = $_POST['comments'];


    $sql = "INSERT INTO Register_form (Name, Email_Id  , Phone_Number, Select_Cource, Additional_Commends) VALUES ('$name','$email','$phone','$course','$comments')";

    // Execute query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../login.php");
    } else {
        echo "data not store";
        }
}

// Close connection
// mysqli_close($conn);



