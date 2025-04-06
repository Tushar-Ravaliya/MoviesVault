<?php
include("config/connection.php");

// Check if token is provided
if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);

    // Check if token exists in database
    $check_token_query = "SELECT * FROM users WHERE activation_token = '$token' AND status = 'inactive'";
    $check_token_result = mysqli_query($conn, $check_token_query);

    if (mysqli_num_rows($check_token_result) == 1) {
        // Token is valid, activate the user
        $user = mysqli_fetch_assoc($check_token_result);

        // Update user status to active and clear the token
        $update_query = "UPDATE users SET status = 'active', activation_token = '' WHERE id = {$user['id']}";

        if (mysqli_query($conn, $update_query)) {
            // Activation successful, redirect to login
            header("Location: public/views/login.php?msg=account_activated");
            exit();
        } else {
            // Database error
            header("Location: public/views/login.php?error=activation_failed");
            exit();
        }
    } else {
        // Invalid or expired token
        header("Location: public/views/login.php?error=invalid_token");
        exit();
    }
} else {
    // No token provided
    header("Location: public/views/login.php?error=missing_token");
    exit();
}
