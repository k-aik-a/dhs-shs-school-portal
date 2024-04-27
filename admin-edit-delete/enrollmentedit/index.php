<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="../../images/school/OIP.png"/>
<title>Dapdap High School-Senior High School | Enrollment Management</title>
<style>
body {
    font-family: Georgia, serif;
    margin: 20px;
    background-color: #f9f9f9;
}

.container {
    width: 80%;
    margin: auto;
}

form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #741B27;
}

input[type="text"],
input[type="password"],
input[type="number"],
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #741B27;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #8e2430;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #741B27;
}

th, td {
    padding: 10px;
    text-align: left;
}

h2, h3 {
    color: #741B27;
    margin-bottom: 10px;
}
.button-container {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 20px 75px;
            background-color: #741B27;
            color: #F9F9F9;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 5px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #3E0B13;
        }

        body {
            animation: fadeInAnimation ease 3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInAnimation {
            0% {
            opacity: 0;
        }
            100% {
            opacity: 1;
        }
    }

</style>
</head>
<body>

<div class="container">
    <?php
    include_once 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["addUser"])) {
            $lrn = $_POST["lrn"];
            $grade = $_POST["grade"];
            $schoolyear = $_POST["schoolyear"];
            $name = $_POST["name"];
            $birthdate = $_POST["birthdate"];
            $age = $_POST["age"];
            $sex = $_POST["sex"];
            $birthplace = $_POST["birthplace"];
            $address = $_POST["address"];
            $father = $_POST["father"];
            $fatherno = $_POST["fatherno"];
            $mother = $_POST["mother"];
            $motherno = $_POST["motherno"];
            $guardian = $_POST["guardian"];
            $guardiannumber = $_POST["guardiannumber"];
            $track = $_POST["track"];
            $strand = $_POST["strand"];

            addUser($lrn, $grade, $schoolyear, $name, $birthdate, $age, $sex, $birthplace, $address, $father, $fatherno, $mother, $motherno, $guardian, $guardiannumber, $track, $strand);
        } elseif (isset($_POST["deleteUser"])) {
            $id = $_POST["id"];
            deleteUser($id);
        }
    }
    ?>

    <h2>Enrollment Management</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Add Enrollment Form</h3>
        <label for="lrn">LRN:</label>
        <input type="text" name="lrn" required>

        <label for="grade">Grade:</label>
        <input type="number" name="grade" required>

        <label for="schoolyear">School Year:</label>
        <input type="text" name="schoolyear" required>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="birthdate">Birthdate:</label>
        <input type="text" name="birthdate" placeholder="YYYY-MM-DD" required>

        <label for="age">Age:</label>
        <input type="number" name="age" required>

        <label for="sex">Sex:</label>
        <select name="sex" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="birthplace">Birthplace:</label>
        <input type="text" name="birthplace" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="father">Father's Name:</label>
        <input type="text" name="father" required>

        <label for="fatherno">Father's Contact:</label>
        <input type="text" name="fatherno" required>

        <label for="mother">Mother's Name:</label>
        <input type="text" name="mother" required>

        <label for="motherno">Mother's Contact:</label>
        <input type="text" name="motherno" required>

        <label for="guardian">Guardian:</label>
        <input type="text" name="guardian" required>

        <label for="guardiannumber">Guardian's Contact:</label>
        <input type="text" name="guardiannumber" required>

        <label for="track">Track:</label>
        <input type="text" name="track" required>

        <label for="strand">Strand:</label>
        <input type="text" name="strand" required>

        <button type="submit" name="addUser">Add User</button>
    </form>

    <h3>Enrollment Forms</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>LRN</th>
            <th>Grade</th>
            <th>School Year</th>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Birthplace</th>
            <th>Address</th>
            <th>Father's Name</th>
            <th>Father's Contact</th>
            <th>Mother's Name</th>
            <th>Mother's Contact</th>
            <th>Guardian</th>
            <th>Guardian's Contact</th>
            <th>Track</th>
            <th>Strand</th>
            <th>Actions</th>
        </tr>
        <?php
        $users = getUsers();
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['lrn']}</td>";
            echo "<td>{$user['grade']}</td>";
            echo "<td>{$user['schoolyear']}</td>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['birthdate']}</td>";
            echo "<td>{$user['age']}</td>";
            echo "<td>{$user['sex']}</td>";
            echo "<td>{$user['birthplace']}</td>";
            echo "<td>{$user['address']}</td>";
            echo "<td>{$user['father']}</td>";
            echo "<td>{$user['fatherno']}</td>";
            echo "<td>{$user['mother']}</td>";
            echo "<td>{$user['motherno']}</td>";
            echo "<td>{$user['guardian']}</td>";
            echo "<td>{$user['guardiannumber']}</td>";
            echo "<td>{$user['track']}</td>";
            echo "<td>{$user['strand']}</td>";
            echo "<td>
                <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                    <input type='hidden' name='id' value='{$user['id']}'>
                    <button type='submit' name='deleteUser'>Delete</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<div class="button-container">
<a href="../adminindex.html" class="button">Home</a>
</div>
</body>
</html>

