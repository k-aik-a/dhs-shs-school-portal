<?php
// Include database configuration
include_once 'config.php';

// Function to add a new user
function addUser($lrn, $grade, $schoolyear, $name, $birthdate, $age, $sex, $birthplace, $address, $father, $fatherno, $mother, $motherno, $guardian, $guardiannumber, $track, $strand) {
    global $conn;
    $sql = "INSERT INTO enrollments (lrn, grade, schoolyear, name, birthdate, age, sex, birthplace, address, father, fatherno, mother, motherno, guardian, guardiannumber, track, strand) VALUES ('$lrn', '$grade', '$schoolyear', '$name', '$birthdate', '$age', '$sex', '$birthplace', '$address', '$father', '$fatherno', '$mother', '$motherno', '$guardian', '$guardiannumber', '$track', '$strand')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a user
function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM enrollments WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to fetch all enrollments
function getUsers() {
    global $conn;
    $sql = "SELECT id, lrn, grade, schoolyear, name, birthdate, age, sex, birthplace, address, father, fatherno, mother, motherno, guardian, guardiannumber, track, strand FROM enrollments";
    $result = $conn->query($sql);
    $enrollments = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $enrollments[] = array(
                "id" => $row["id"],
                "lrn" => $row["lrn"],
                "grade" => $row["grade"],
                "schoolyear" => $row["schoolyear"],
                "name" => $row["name"],
                "birthdate" => $row["birthdate"],
                "age" => $row["age"],
                "sex" => $row["sex"],
                "birthplace" => $row["birthplace"],
                "address" => $row["address"],
                "father" => $row["father"],
                "fatherno" => $row["fatherno"],
                "mother" => $row["mother"],
                "motherno" => $row["motherno"],
                "guardian" => $row["guardian"],
                "guardiannumber" => $row["guardiannumber"],
                "track" => $row["track"],
                "strand" => $row["strand"]
            );
        }
    }
    return $enrollments;
}
?>
