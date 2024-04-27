<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/school/OIP.png"/>
    <title>Dapdap High School-Senior High School | Account Management | Students</title>
    <style>
        body {
            font-family: Georgia, serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #741B27;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        form {
            margin-bottom: 20px;
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

    label, h2, h3, text {
        color: #741B27
    }

    button {
        font-family: Georgia, serif;
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

    </style>
</head>
<body>

    <?php
    // Include functions
    include_once 'functions.php';

    // Process form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["addUser"])) {
            $lrn = $_POST["lrn"];
            $password = $_POST["password"];
            addUser($lrn, $password);
        } elseif (isset($_POST["updateUser"])) {
            $recordID = $_POST["recordID"];
            $newPassword = $_POST["newPassword"];
            updateUser($recordID, $newPassword);
        } elseif (isset($_POST["deleteUser"])) {
            $recordID = $_POST["recordID"];
            deleteUser($recordID);
        }
    }
    ?>

    <h2>Account Management | Students</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Add User</h3>
        <label for="lrn">LRN:</label>
        <input type="text" name="lrn" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="addUser">Add User</button>
    </form>

    <h3>Users</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>LRN</th>
            <th>Actions</th>
        </tr>
        <?php
        $users = getUsers();
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['recordID']}</td>";
            echo "<td>{$user['lrn']}</td>";
            echo "<td>
                    <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                        <input type='hidden' name='recordID' value='{$user['recordID']}'>
                        <label for='newPassword'>New Password:</label>
                        <input type='password' name='newPassword' required>
                        <button type='submit' name='updateUser'>Update</button>
                    </form>
                    <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                        <input type='hidden' name='recordID' value='{$user['recordID']}'>
                        <button type='submit' name='deleteUser'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <div class="button-container">
<a href="../adminindex.html" class="button">Home</a>
</div>
</body>
</html>
