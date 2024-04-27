<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection
    include 'db_connection.php';

    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $query = "SELECT * FROM stafftb WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists
        $user = mysqli_fetch_assoc($result);
        
        // Check if the email is admin's email
        if ($user['email'] == "admin@admin") {
            // User is admin, set session variables and redirect to admin page
            $_SESSION['email'] = $email;
            $_SESSION['is_admin'] = true;
            header("location: ../admin-edit-delete/adminindex.html");
            exit(); // Stop further execution after redirection
        } elseif ($email == "staff2@gmail.com") {
            // Redirect to teacherlogin2.html
            header("location: ../pages/teacherprofile2.html");
            exit(); // Stop further execution after redirection
        } elseif ($email == "teacher2@gmail.com") {
            // Redirect to teacherlogin3.html
            header("location: ../pages/teacherprofile3.html");
            exit(); // Stop further execution after redirection
        } else {
            // Redirect to default teacher login page
            header("location: ../pages/teacherprofile.html");
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
