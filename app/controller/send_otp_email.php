<?php
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
