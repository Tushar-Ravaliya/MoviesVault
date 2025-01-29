<?php
include("../../config/connection.php");
var_dump($_SERVER['REQUEST_METHOD']);
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $mobile_no = filter_var($_POST['mobile_no'], FILTER_SANITIZE_NUMBER_INT);
    $pic = $_FILES['pic'];


    // Handle file upload
    $pic_name = "";
    if ($pic && $pic['error'] === UPLOAD_ERR_OK) {
        $pic_name = time() . '_' . basename($pic['name']);
        $target_path = '../../public/profile/' . $pic_name; // Ensure trailing slash for directory
        move_uploaded_file($pic['tmp_name'], $target_path);
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database using prepared statement
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, status, role, pic, number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $active_status = 'active'; // Active by default
    $role = 'user'; // Default role

    if (!$stmt) {
        die("Prepared statement failed: " . $conn->error);
    }

    $stmt->bind_param('sssssss', $name, $email, $hashed_password, $active_status, $role, $pic_name, $mobile_no);

    if ($stmt->execute()) {
        header("Location: http://localhost/moviesvault/src/user/login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Error: Invalid request method or missing signup parameter.';
}
