<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "HomeSwitchHome";

  $con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Create database connection

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
