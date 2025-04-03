<?php
require_once("../../config/connection.php");
session_start();

// Check if email parameter exists
if (!isset($_GET['email'])) {
    header("Location: forget_password.php");
    exit;
}

$email = $_GET['email'];

// Handle OTP verification
if (isset($_POST['verify_otp'])) {
    $otp = trim($_POST['otp']);

    // Validate OTP
    if (empty($otp)) {
        $_SESSION['error'] = "OTP is required";
    } else {
        // Check if OTP exists and is valid
        $stmt = $conn->prepare("SELECT * FROM password_reset_otps 
                       WHERE email = ? AND otp = ? AND is_used = 0 
                       AND CONVERT_TZ(expires_at, 'System', '+00:00') > CONVERT_TZ(NOW(), 'System', '+00:00')");
        $stmt->bind_param("ss", $email, $otp);
        $stmt->execute();
        $result = $stmt->get_result();

        // In verify_otp.php, when OTP verification is successful:
        if ($result->num_rows > 0) {
            // OTP is valid - mark it as used
            $update = $conn->prepare("UPDATE password_reset_otps SET is_used = 1 WHERE email = ? AND otp = ?");
            $update->bind_param("ss", $email, $otp);
            $update->execute();

            // Get user ID from email
            $user_query = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $user_query->bind_param("s", $email);
            $user_query->execute();
            $user_result = $user_query->get_result();

            if ($user_result->num_rows > 0) {
                $user = $user_result->fetch_assoc();
                $user_id = $user['id'];

                // Generate a new token
                $token = bin2hex(random_bytes(32));
                $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

                // Store token in database
                $token_stmt = $conn->prepare("INSERT INTO password_reset_tokens (user_id, token, expires_at) VALUES (?, ?, ?)");
                $token_stmt->bind_param("iss", $user_id, $token, $expires_at);
                $token_stmt->execute();

                // Redirect to reset password page with token
                header("Location: reset_password.php?token=" . $token);
                exit;
            } else {
                $_SESSION['error'] = "User not found.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
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
                        <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Verify OTP</h1>
                        <p class="text-gray-200 text-center text-base font-medium leading-6">We've sent an OTP to your email. Enter it below to continue.</p>
                    </div>

                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-6">
                        <input type="text" name="otp"
                            class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4"
                            placeholder="Enter OTP" maxlength="6" required>
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <button type="submit" name="verify_otp"
                        class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-6">
                        Verify OTP
                    </button>

                    <div class="text-center">
                        <p class="text-gray-200 text-base font-medium leading-6">
                            Didn't receive the OTP?
                            <a href="forgot_password.php" class="text-indigo-600 font-semibold">Resend</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>