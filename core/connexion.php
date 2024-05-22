<?php
// Database credentials

require_once "config.php";


// Create connection
$connection = new mysqli(HOST,USER,PASS,DBNAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Close connection 


?>
