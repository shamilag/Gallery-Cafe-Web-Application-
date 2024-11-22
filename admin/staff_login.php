<?php
// Start se

// Include constants.php for configurations
include('../config/constants.php');

// Handle login form submission
if(isset($_POST['submit'])) {
    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Replace with password_hash() for security
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    // SQL query to check user credentials
    $sql = "SELECT * FROM table_admin WHERE (username=? OR email=?) AND password=? AND position=?";
    
    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $username, $password, $position);
    mysqli_stmt_execute($stmt);
    
    // Get result
    $res = mysqli_stmt_get_result($stmt);
    
    // Check if user exists
    $count = mysqli_num_rows($res);

    if($count == 1) {
        $row = mysqli_fetch_assoc($res);

        // Set session variables
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $row['username'];
        $_SESSION['position'] = $row['position'];

        // Redirect based on position
        if($_SESSION['position'] == 'admin') {
            header('location: ../admin/index.php');
            exit;
        } elseif($_SESSION['position'] == 'staff') {
            header('location: ../admin/staff-index.php');
            exit;
        } else {
            // Invalid position, redirect to login page
            $_SESSION['login'] = "<div class='error text-center'>Login Failed (Check your Username or Password).</div>";
            header('location: '.SITEURL.'admin/staff_login.php');
            exit;
        }
    } else {
        // User not found, login failed
        $_SESSION['login'] = "<div class='error text-center'>Login Failed (Check your Username or Password).</div>";
        header('location: '.SITEURL.'admin/staff_login.php');
        exit;
    }
}
?>

<!-- HTML code for the login page -->
<!DOCTYPE html>
<html>
<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            background: url(../images/ad6.jpg); /* Adjust as necessary */
        }
    </style>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <?php
        // Display login messages if set in session
        if(isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>

        <!-- Login form starts here -->
        <form action="" method="POST" class="text-center">
            <br><br>
            Username/Email: <br>
            <input type="text" name="username" placeholder="Enter Username/email"> <br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"> <br><br>
            Position: <br>
            <select name="position" id="position">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select> <br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        <!-- Login form ends here -->

        <br><p class="text-center">Created by - <a href="https://www.shamila.com">Shamila Gunawardene</a></p>
    </div>
</body>
</html>
