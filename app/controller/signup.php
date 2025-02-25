<?php
require_once '../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $mobile_no = filter_var($_POST['mobile_no'], FILTER_SANITIZE_NUMBER_INT);
    $pic = $_FILES['pic'];

    // Validate passwords
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    // Handle file upload
    $pic_name = "";
    if (!empty($pic['name']) && $pic['error'] === UPLOAD_ERR_OK) {
        $pic_name = time() . '_' . basename($pic['name']);
        $target_path = '../../public/profile/' . $pic_name;
        move_uploaded_file($pic['tmp_name'], $target_path);
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user
    $query = "INSERT INTO users (name, email, password, status, role, pic, number) VALUES ('$name', '$email', '$hashed_password', 'active', 'user', '$pic_name', '$mobile_no')";

    if (mysqli_query($conn, $query)) {
        header("Location: http://localhost/moviesvault/src/user/login.php");
        exit();
    } else {
        echo "Error: Could not register user. " . mysqli_error($conn);
    }
} else {
    echo 'Error: Invalid request method.';
}

mysqli_close($conn);
