<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/school/OIP.png"/>
    <title>Dapdap High School-Senior High School | Student Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Student Login</h2>

        <?php
        // Check for error codes in URL parameters and display corresponding error messages
        if (isset($_GET['error'])) {
            $errorMessage = '';
            switch ($_GET['error']) {
                case '1':
                    $errorMessage = "Incorrect LRN or password. Please try again.";
                    break;
                case '2':
                    $errorMessage = "User does not exist. Please check your LRN.";
                    break;
                case '3':
                    $errorMessage = "Form was not submitted. Please log in.";
                    break;
                default:
                    $errorMessage = "An error occurred. Please try again.";
                    break;
            }
            echo '<p style="color: red;">' . $errorMessage . '</p>';
        }
        ?>

        <form action="authenticate.php" method="post">
            <div class="input-group">
                <label for="lrn">LRN</label>
                <input type="lrn" id="lrn" name="lrn" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>