<?php

// Sign-Up Functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $mobile_no = filter_var($_POST['mobile_no'], FILTER_SANITIZE_NUMBER_INT);
    $pic = $_FILES['pic'];

    // Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }
    if (strlen($password) < 6) {
        die('Password must be at least 6 characters long.');
    }
    if ($password !== $confirm_password) {
        die('Passwords do not match.');
    }

    // Handle file upload
    $pic_name = "";
    if ($pic && $pic['error'] === UPLOAD_ERR_OK) {
        $pic_name = time() . '_' . basename($pic['name']);
        $target_path = 'uploads/' . $pic_name;
        move_uploaded_file($pic['tmp_name'], $target_path);
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (email, password, status, role, pic, mobile_no) VALUES (?, ?, ?, ?, ?, ?)");
    $active_status = 1; // Active by default
    $role = 'user'; // Default role
    $stmt->bind_param('ssiiss', $email, $hashed_password, $active_status, $role, $pic_name, $mobile_no);

    if ($stmt->execute()) {
        echo 'Sign-up successful!';
    } else {
        echo 'Error: ' . $stmt->error;
    }
    $stmt->close();
}

// Sign-In Functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role, status FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            if ($user['status'] === 1) { // Check if user is active
                // Set cookies for user authentication
                setcookie('user_id', $user['id'], time() + (86400 * 30), '/'); // Expires in 30 days
                setcookie('role', $user['role'], time() + (86400 * 30), '/'); // Expires in 30 days
                echo 'Sign-in successful!';
                // Redirect based on role
                if ($user['role'] === 'admin') {
                    header('Location: admin_dashboard.php');
                } else {
                    header('Location: user_dashboard.php');
                }
                exit;
            } else {
                echo 'Your account is inactive. Please contact support.';
            }
        } else {
            echo 'Invalid password.';
        }
    } else {
        echo 'User not found.';
    }
    $stmt->close();
}

$conn->close();

?>

<!-- Sign-Up Form -->
<h2>Sign Up</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required><br>
    <label>Mobile No:</label>
    <input type="text" name="mobile_no" required><br>
    <label>Profile Picture:</label>
    <input type="file" name="pic"><br>
    <button type="submit" name="signup">Sign Up</button>
</form>

<!-- Sign-In Form -->
<h2>Sign In</h2>
<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit" name="signin">Sign In</button>
</form>