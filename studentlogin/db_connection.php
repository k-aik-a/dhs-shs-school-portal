<?php
// Database configuration
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "dhsshsdb"; // Replace with your database name
$port = 3308; // Specify the port number here

// Create connection
$connection = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
