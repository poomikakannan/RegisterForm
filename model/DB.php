<?php

// $config = require("../config.php");

class Databaseconnection
{
    public $connection;
    public function __construct($config)
    {
       $this->connection = mysqli_connect($config["host"], $config["root"], $config["password"], $config["database"]);

        if (!$this->connection) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
        else{
            // echo "connection passed";
        }
    }

    public function dbConnection()
    {
        return $this->connection;
    }
}