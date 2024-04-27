<?php
// Database Configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "dhsshsdb";
$port = 3308;

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
