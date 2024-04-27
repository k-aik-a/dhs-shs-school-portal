<?php
// Include database configuration
include_once 'config.php';

// Function to add a new user
function addUser($email, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO stafftb (email, password) VALUES ('$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to update user email
function updateEmail($recordID, $newEmail) {
    global $conn;
    $sql = "UPDATE stafftb SET email='$newEmail' WHERE recordID=$recordID";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to update user password
function updatePassword($recordID, $newPassword) {
    global $conn;
    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE stafftb SET password='$hashed_password' WHERE recordID=$recordID";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a user
function deleteUser($recordID) {
    global $conn;
    $sql = "DELETE FROM stafftb WHERE recordID=$recordID";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to fetch all stafftb
function getUsers() {
    global $conn;
    $sql = "SELECT recordID, email FROM stafftb";
    $result = $conn->query($sql);
    $stafftb = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $stafftb[] = array("recordID" => $row["recordID"], "email" => $row["email"]);
        }
    }
    return $stafftb;
}
?>
