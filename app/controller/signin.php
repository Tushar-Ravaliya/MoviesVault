<?php
session_start();
require_once '../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Invalid request.");
}

// Sanitize input
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// User login - Use prepared statements to prevent SQL injection
$userQuery = "SELECT * FROM users WHERE email = ? LIMIT 1";
$userStmt = mysqli_prepare($conn, $userQuery);
mysqli_stmt_bind_param($userStmt, "s", $email);
mysqli_stmt_execute($userStmt);
$userResult = mysqli_stmt_get_result($userStmt);

// Theater login - Use prepared statements to prevent SQL injection
$theaterQuery = "SELECT * FROM theaters WHERE email = ? LIMIT 1";
$theaterStmt = mysqli_prepare($conn, $theaterQuery);
mysqli_stmt_bind_param($theaterStmt, "s", $email);
mysqli_stmt_execute($theaterStmt);
$theaterResult = mysqli_stmt_get_result($theaterStmt);

// Check if user login is successful
if ($userResult && mysqli_num_rows($userResult) === 1) {
    $user = mysqli_fetch_assoc($userResult);

    // Verify password
    if (password_verify($password, $user['password'])) {
        if ($user['status'] !== 'active') {
            $_SESSION['error'] = "Your account is inactive. Please contact support.";
            header("Location: ../../src/user/login.php");
            exit();
        }

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $user['role'];
        $_SESSION['pic'] = $user['pic'];

        // Redirect based on user role
        if ($user['role'] === 'admin') {
            $redirectUrl = 'http://localhost/moviesvault/src/admin/index.php';
        } else {
            $redirectUrl = 'http://localhost/moviesvault/src/user/index.php';
        }

        header("Location: $redirectUrl");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../../src/user/login.php");
        exit();
    }
}
// Check if theater login is successful
elseif ($theaterResult && mysqli_num_rows($theaterResult) === 1) {
    $theater = mysqli_fetch_assoc($theaterResult);

    // Verify password
    if (password_verify($password, $theater['password_hash'])) {
        if ($theater['status'] !== 'Active') {
            $_SESSION['error'] = "Your theater account is inactive. Please contact support.";
            header("Location: ../../src/user/login.php");
            exit();
        }

        // Set session variables for theater
        $_SESSION['theater_id'] = $theater['id'];
        $_SESSION['theater_name'] = $theater['title'];
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'operator';
        $_SESSION['pic'] = $theater['pic'];
        $_SESSION['owner_name'] = $theater['owner_name'];

        // Redirect to theater dashboard
        header("Location: ../../src/operator/index.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../../src/user/login.php");
        exit();
    }
}
// No matching account found
else {
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: ../../src/user/login.php");
    exit();
}

mysqli_stmt_close($userStmt);
mysqli_stmt_close($theaterStmt);
mysqli_close($conn);
