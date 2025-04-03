<?php
require_once("../../config/connection.php");
require '../../vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();
// Include the OTP email function
function sendOTPEmail($email, $otp)
{
    global $_SERVER;

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = $_ENV['MAIL_HOST']; // SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USERNAME']; // SMTP username
        $mail->Password = $_ENV['MAIL_PASSWORD']; // SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = (int)$_ENV['MAIL_PORT']; // TCP port to connect to, cast to int

        // Recipients
        $mail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['APP_NAME']);
        $mail->addAddress($email); // Add recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Password Reset OTP';
        $mail->Body = "
<html>

<head>
    <title>Password Reset OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .otp-container {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            font-size: 24px;
            letter-spacing: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class='container'>
        <h2>Password Reset OTP</h2>
        <p>Hello,</p>
        <p>You have requested to reset your password. Please use the following OTP code to verify your request:</p>
        <div class='otp-container'>{$otp}</div>
        <p>This OTP will expire in 10 minutes.</p>
        <p>If you did not request this change, please ignore this email or contact our support team immediately.</p>
        <p>Regards,<br>{$_ENV['APP_NAME']}</p>
    </div>
</body>

</html>
";
        $mail->AltBody = "Hello, You have requested to reset your password. Please use the following OTP code to verify your request: {$otp}. This OTP will expire in 10 minutes. If you did not request this change, please ignore this email or contact our support team immediately. Regards, {$_ENV['APP_NAME']}";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

if (isset($_POST['reset'])) {
    $email = trim($_POST['email']);

    // Validate email
    if (empty($email)) {
        $_SESSION['error'] = "Email is required";
        header("Location: ../../src/user/forget_password.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format";
        header("Location: ../../src/user/forget_password.php");
        exit;
    }

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // For security, don't reveal if email exists or not
        $_SESSION['message'] = "If your email exists in our system, you'll receive a password reset OTP shortly.";
        header("Location: ../../src/user/forget_password.php");
        exit;
    }

    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Generate a 6-digit OTP
    $otp = sprintf("%06d", mt_rand(1, 999999));

    // Calculate expiration time (10 minutes from now)
    $expires_at = date('Y-m-d H:i:s', strtotime('+10 minutes'));

    // Delete any existing OTPs for this user
    $delete_stmt = $conn->prepare("DELETE FROM password_reset_otps WHERE user_id = ?");
    $delete_stmt->bind_param("i", $user_id);
    $delete_stmt->execute();

    // Store the new OTP in the database
    $insert_stmt = $conn->prepare("INSERT INTO password_reset_otps (user_id, email, otp, expires_at) VALUES (?, ?, ?, ?)");
    $insert_stmt->bind_param("isss", $user_id, $email, $otp, $expires_at);

    if ($insert_stmt->execute()) {
        // Send the OTP email
        if (sendOTPEmail($email, $otp)) {
            $_SESSION['message'] = "OTP has been sent to your email address. Please check your inbox.";
            header("Location: ../../src/user/verify_otp.php?email=" . urlencode($email));
            exit;
        } else {
            $_SESSION['error'] = "Failed to send email. Please try again later.";
            header("Location: ../../src/user/forget_password.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again later.";
        header("Location: ../../src/user/forget_password.php");
        exit;
    }
} else {
    // If accessed directly without form submission
    header("Location: ../../src/user/forget_password.php");
    exit;
}
