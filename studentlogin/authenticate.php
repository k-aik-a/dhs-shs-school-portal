<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection
    include 'db_connection.php';

    // Get user input
    $lrn = $_POST['lrn'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $query = "SELECT * FROM studentstb WHERE lrn='$lrn' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, set session variables
        $_SESSION['lrn'] = $lrn;

        // Redirect to appropriate profile based on LRN
        if ($lrn == '12345') {
            header("location: ../pages/studentprofile2.html");
            exit(); // Stop further execution after redirection
        } elseif ($lrn == '54321') {
            header("location: ../pages/studentprofile3.html");
            exit(); // Stop further execution after redirection
        } else {
            header("location: ../pages/studentprofile.html");
            exit(); // Stop further execution after redirection
        }
    } else {
        // Password is incorrect, redirect back to login page with error message
        header("location: login.php?error=1");
        exit(); // Stop further execution after redirection
    }
} else {
    // If the form wasn't submitted, redirect back to login page with error message
    header("location: login.php?error=3");
    exit(); // Stop further execution after redirection
}
?>
