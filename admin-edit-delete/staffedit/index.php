<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../images/school/OIP.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapdap High School-Senior High School | Account Management | Teachers & Staffs</title>
    <style>
        body {
            font-family: Georgia, serif;
            margin: 20px;
            background-color: #F9F9F9;
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
    } body {
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
            $email = $_POST["email"];
            $password = $_POST["password"];
            addUser($email, $password);
        } elseif (isset($_POST["updateEmail"])) {
            $userId = $_POST["userId"];
            $newEmail = $_POST["newEmail"];
            updateEmail($userId, $newEmail);
        } elseif (isset($_POST["updatePassword"])) {
            $userId = $_POST["userId"];
            $newPassword = $_POST["newPassword"];
            updatePassword($userId, $newPassword);
        } elseif (isset($_POST["deleteUser"])) {
            $userId = $_POST["userId"];
            deleteUser($userId);
        }
    }
    ?>

    <h2>Account Management | Teachers & Staffs</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Add User</h3>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="addUser">Add User</button>
    </form>

    <h3>Users</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        $users = getUsers();
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['recordID']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>
                    <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                        <input type='hidden' name='userId' value='{$user['recordID']}'>
                        <label for='newEmail'>New Email:</label>
                        <input type='email' name='newEmail' required>
                        <button type='submit' name='updateEmail'>Update Email</button>
                    </form>
                    <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                        <input type='hidden' name='userId' value='{$user['recordID']}'>
                        <label for='newPassword'>New Password:</label>
                        <input type='password' name='newPassword' required>
                        <button type='submit' name='updatePassword'>Update Password</button>
                    </form>
                    <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                        <input type='hidden' name='userId' value='{$user['recordID']}'>
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
