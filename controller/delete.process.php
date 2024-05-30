
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config=require("../config.php");
$dp = require("../model/DB.php");

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->dbConnection();

$id  = $_GET['id'];

$query = "DELETE FROM Register_form WHERE id= '$id' ";
$result =$conn->query($query);

if($result){
    header("Location:../view.php");
}else{
   echo "datas not deleted";
}

$conn->close();
?>