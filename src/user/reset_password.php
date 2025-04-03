<?php
require_once("../../config/connection.php");
session_start();

// Check if token parameter exists
if (!isset($_GET['token'])) {
    header("Location: forgot_password.php");
    exit;
}

$token = $_GET['token'];

// Check if token is valid
$stmt = $conn->prepare("SELECT * FROM password_reset_tokens WHERE token = ? AND is_used = 0 AND expires_at > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Invalid or expired reset token. Please request a new password reset.";
    header("Location: forgot_password.php");
    exit;
}

$token_data = $result->fetch_assoc();
$user_id = $token_data['user_id'];

// Handle password reset form submission
if (isset($_POST['reset_password'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if (empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "Both password fields are required";
    } elseif ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match";
    } elseif (strlen($password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters long";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password
        $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update_stmt->bind_param("si", $hashed_password, $user_id);

        if ($update_stmt->execute()) {
            // Mark the token as used
            $mark_used_stmt = $conn->prepare("UPDATE password_reset_tokens SET is_used = 1 WHERE id = ?");
            $mark_used_stmt->bind_param("i", $token_data['id']);
            $mark_used_stmt->execute();

            $_SESSION['message'] = "Your password has been successfully reset. You can now log in with your new password.";
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['error'] = "Failed to update password. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="../../public/output.css" rel="stylesheet">
</head>

<body class="font-inter overflow-hidden">
    <section class="flex justify-center relative">
        <img src="../../public/Images/login_img.png" alt="gradient background image"
            class="w-full h-full object-cover fixed border-none backdrop-blur-sm">
        <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
            <img src="../../public/Images/logo-white.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <div class="rounded-2xl bg-gray-200/20 backdrop-blur-sm shadow-xl z-10">
                <form method="POST" class="lg:p-11 p-7 mx-auto">
                    <div class="mb-11">
                        <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Reset Password</h1>
                        <p class="text-gray-200 text-center text-base font-medium leading-6">Enter your new password below.</p>
                    </div>

                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-6">
                        <input type="password" name="password"
                            class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-4"
                            placeholder="New Password" required>
                        <input type="password" name="confirm_password"
                            class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4"
                            placeholder="Confirm New Password" required>
                    </div>

                    <button type="submit" name="reset_password"
                        class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-6">
                        Reset Password
                    </button>

                    <div class="text-center">
                        <a href="login.php" class="text-gray-200 text-base font-medium leading-6">
                            Back to <span class="text-indigo-600 font-semibold">Log In</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>