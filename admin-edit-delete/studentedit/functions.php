<?php
// Include database configuration
include_once 'config.php';

// Function to add a new user
function addUser($lrn, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO studentstb (lrn, password) VALUES ('$lrn', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to update user password
function updateUser($recordID, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE studentstb SET password='$hashed_password' WHERE recordID=$recordID";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a user
function deleteUser($recordID) {
    global $conn;
    $sql = "DELETE FROM studentstb WHERE recordID=$recordID";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to fetch all studentstb
function getUsers() {
    global $conn;
    $sql = "SELECT recordID, lrn FROM studentstb";
    $result = $conn->query($sql);
    $studentstb = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $studentstb[] = array("recordID" => $row["recordID"], "lrn" => $row["lrn"]);
        }
    }
    return $studentstb;
}
?>
