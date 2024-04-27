<?php
// Database connection settings
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $lrn = $_POST['lrn'];
    $grade = intval($_POST['grade']);
    $schoolyear = htmlspecialchars($_POST['schoolyear']);
    $name = htmlspecialchars($_POST['name']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $age = intval($_POST['age']);
    $sex = htmlspecialchars($_POST['sex']);
    $birthplace = htmlspecialchars($_POST['birthplace']);
    $address = htmlspecialchars($_POST['address']);
    $father = htmlspecialchars($_POST['father']);
    $fatherno = intval($_POST['fatherno']);
    $mother = htmlspecialchars($_POST['mother']);
    $motherno = intval($_POST['motherno']);
    $guardian = htmlspecialchars($_POST['guardian']);
    $guardiannumber = intval($_POST['guardiannumber']);
    $track = htmlspecialchars($_POST['track']);
    $strand = htmlspecialchars($_POST['strand']);

    // Check if LRN already exists
    $check_sql = "SELECT id FROM enrollments WHERE lrn = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $lrn);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "LRN $lrn is already registered!";
    } else {
        // Proceed with insertion
        $insert_sql = "INSERT INTO enrollments (lrn, grade, schoolyear, name, birthdate, age, sex, birthplace, address, father, fatherno, mother, motherno, guardian, guardiannumber, track, strand)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
        // Prepare and bind parameters for insertion
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sisssssssssssssss", $lrn, $grade, $schoolyear, $name, $birthdate, $age, $sex, $birthplace, $address, $father, $fatherno, $mother, $motherno, $guardian, $guardiannumber, $track, $strand);

        // Execute insertion statement
        if ($insert_stmt->execute() === TRUE) {
            echo '<div class="success-message">New record created successfully</div>';
        } else {
            echo '<div class="error-message">Error: ' . $insert_stmt->error . '</div>';
        }

        // Close statement
        $insert_stmt->close();
    }

    // Close check statement
    $check_stmt->close();
}

// Close connection
$conn->close();
?>
