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
function sendVerificationEmail($email, $verification_code, $newNumber)
{
     global $_SERVER;

     // Create verification URL
     $verification_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?verify=1&code=" . $verification_code . "&number=" . $newNumber;

     // Create a new PHPMailer instance
     $mail = new PHPMailer\PHPMailer\PHPMailer(true);

     try {
          // Server settings
          $mail->isSMTP();                                      // Send using SMTP
          $mail->Host       = $_ENV['MAIL_HOST'];               // SMTP server
          $mail->SMTPAuth   = true;                             // Enable SMTP authentication
          $mail->Username   = $_ENV['MAIL_USERNAME'];           // SMTP username
          $mail->Password   = $_ENV['MAIL_PASSWORD'];           // SMTP password
          $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
          $mail->Port       = (int)$_ENV['MAIL_PORT'];          // TCP port to connect to, cast to int

          // Recipients
          $mail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['APP_NAME']);
          $mail->addAddress($email);                            // Add recipient

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Verify Phone Number Change';
          $mail->Body    = "
        <html>
        <head>
            <title>Phone Number Change Verification</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .button { display: inline-block; padding: 10px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 4px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Phone Number Change Verification</h2>
                <p>Hello,</p>
                <p>We received a request to change your phone number to: <strong>{$newNumber}</strong></p>
                <p>If you made this request, please click the button below to verify this change:</p>
                <p><a href='{$verification_url}' class='button'>Verify Phone Number Change</a></p>
                <p>Or copy and paste this link into your browser:</p>
                <p>{$verification_url}</p>
                <p>If you did not request this change, please ignore this email or contact our support team immediately.</p>
                <p>This verification link will expire in 24 hours.</p>
                <p>Regards,<br>{$_ENV['APP_NAME']}</p>
            </div>
        </body>
        </html>
        ";
          $mail->AltBody = "Hello, We received a request to change your phone number to: {$newNumber}. If you made this request, please verify by visiting this link: {$verification_url}. If you did not request this change, please ignore this email or contact our support team immediately. This verification link will expire in 24 hours. Regards, {$_ENV['APP_NAME']}";

          $mail->send();
          return true;
     } catch (Exception $e) {
          error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
          return false;
     }
}
mysqli_close($conn);
