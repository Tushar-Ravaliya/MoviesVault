<?php
require_once("../../config/connection.php");
require '../../vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="../../public/output.css" rel="stylesheet">
</head>

<body class="font-inter overflow-hidden">
    <section class="flex justify-center relative">
        <img src="../../public/Images/login_img.png" alt="gradient background image"
            class="w-full h-full object-cover fixed border-none backdrop-blur-sm">
        <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
            <img src="../../public/Images/logo-white.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <div class="rounded-2xl bg-gray-200/20 backdrop-blur-sm shadow-xl z-10">
                <form action="../../app/controller/forgot_password.php" method="POST" class="lg:p-11 p-7 mx-auto" id="forgotPasswordForm">
                    <div class="mb-11">
                        <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Reset Password</h1>
                        <p class="text-gray-200 text-center text-base font-medium leading-6">Enter your email to receive a password reset link.</p>

                    </div>
                    <input type="email"
                        class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6"
                        placeholder="Email" name="email" id="email">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>
                    <input
                        class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-11"
                        type="submit" name="reset" value="Send Reset Link">
                    <a href="login.php"
                        class="flex justify-center text-gray-200 text-base font-medium leading-6">Remembered your password? <span class="text-indigo-600 font-semibold pl-3">Log In</span>
                    </a>
                </form>
            </div>
        </div>
    </section>
</body>

</html>