<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Remove authentication cookies
setcookie('user_id', '', time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');
setcookie('name', '', time() - 3600, '/');
setcookie('pic', '', time() - 3600, '/');
// Redirect to login page
header("Location: http://localhost/moviesvault/src/user/login.php");
exit();
