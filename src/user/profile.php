<?php
// Start session if not already started
session_start();
require_once("../../config/connection.php");
require '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
     header("Location: login.php");
     exit;
}

// Process form submission
$message = "";
$messageType = "";

// Get current user data
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, email, number, pic FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle verification code processing
if (isset($_GET['verify']) && isset($_GET['code']) && isset($_GET['number'])) {
     $verification_code = $_GET['code'];
     $new_number = $_GET['number'];

     // Check if verification code is valid
     $stmt = $conn->prepare("SELECT * FROM verification_codes WHERE user_id = ? AND code = ? AND type = 'phone_change' AND expires_at > NOW() AND is_used = 0");
     $stmt->bind_param("is", $user_id, $verification_code);
     $stmt->execute();
     $result = $stmt->get_result();

     if ($result->num_rows > 0) {
          // Update user's phone number
          $updateStmt = $conn->prepare("UPDATE users SET number = ? WHERE id = ?");
          $updateStmt->bind_param("si", $new_number, $user_id);

          if ($updateStmt->execute()) {
               // Mark verification code as used
               $updateCodeStmt = $conn->prepare("UPDATE verification_codes SET is_used = 1 WHERE user_id = ? AND code = ?");
               $updateCodeStmt->bind_param("is", $user_id, $verification_code);
               $updateCodeStmt->execute();

               $message = "Phone number has been successfully updated!";
               $messageType = "success";

               // Update local user data
               $user['number'] = $new_number;
          } else {
               $message = "Error updating phone number: " . $conn->error;
               $messageType = "error";
          }

          $updateStmt->close();
     } else {
          $message = "Invalid or expired verification code.";
          $messageType = "error";
     }

     $stmt->close();
}

// Handle profile info update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
     // Sanitize inputs
     $name = $conn->real_escape_string(trim($_POST['name']));
     $mobile_no = $conn->real_escape_string(trim($_POST['mobile_no']));

     // Validate inputs
     if (empty($name)) {
          $message = "Name is required.";
          $messageType = "error";
     } elseif (!preg_match('/^\d{10}$/', $mobile_no)) {
          $message = "Mobile number must be 10 digits.";
          $messageType = "error";
     } else {
          // Check if phone number has changed
          $numberChanged = ($user['number'] !== $mobile_no);

          if ($numberChanged) {
               // Create verification code
               $verification_code = bin2hex(random_bytes(16)); // Generate 32 char hex code

               // Store verification code in database
               // First, create the table if it doesn't exist
               $conn->query("CREATE TABLE IF NOT EXISTS verification_codes (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    user_id INT NOT NULL,
                    code VARCHAR(64) NOT NULL,
                    type VARCHAR(20) NOT NULL,
                    expires_at DATETIME NOT NULL,
                    is_used TINYINT(1) DEFAULT 0,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
               )");

               // Calculate expiry (24 hours from now)
               $expires_at = date('Y-m-d H:i:s', strtotime('+24 hours'));

               // Insert verification code
               $stmt = $conn->prepare("INSERT INTO verification_codes (user_id, code, type, expires_at) VALUES (?, ?, 'phone_change', ?)");
               $stmt->bind_param("iss", $user_id, $verification_code, $expires_at);
               $stmt->execute();
               $stmt->close();

               // Send verification email
               $verificationSent = sendVerificationEmail($user['email'], $verification_code, $mobile_no);

               if ($verificationSent) {
                    $message = "A verification email has been sent to your email address. Please check your inbox and click the verification link to update your phone number.";
                    $messageType = "success";
               } else {
                    $message = "Failed to send verification email. Please try again later.";
                    $messageType = "error";
               }
          }

          // Update name regardless of phone number change
          $updateQuery = "UPDATE users SET name = ? WHERE id = ?";
          $stmt = $conn->prepare($updateQuery);
          $stmt->bind_param("si", $name, $user_id);

          if ($stmt->execute()) {
               if (!$numberChanged) {
                    $message = "Profile updated successfully!";
                    $messageType = "success";
               }

               // Update session data and local user data
               $_SESSION['user_name'] = $name;
               $user['name'] = $name;
          } else {
               $message = "Error updating profile: " . $conn->error;
               $messageType = "error";
          }

          $stmt->close();
     }
}

// Handle password change
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
     // Sanitize inputs
     $current_password = trim($_POST['current_password']);
     $new_password = trim($_POST['new_password']);
     $confirm_password = trim($_POST['confirm_password']);

     // Validate inputs
     if (empty($current_password)) {
          $message = "Current password is required.";
          $messageType = "error";
     } elseif (empty($new_password)) {
          $message = "New password is required.";
          $messageType = "error";
     } elseif (strlen($new_password) < 6) {
          $message = "New password must be at least 6 characters.";
          $messageType = "error";
     } elseif ($new_password !== $confirm_password) {
          $message = "New passwords do not match.";
          $messageType = "error";
     } else {
          // Verify current password
          $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
          $stmt->bind_param("i", $user_id);
          $stmt->execute();
          $result = $stmt->get_result();
          $userData = $result->fetch_assoc();
          $stmt->close();

          if (!password_verify($current_password, $userData['password'])) {
               $message = "Current password is incorrect.";
               $messageType = "error";
          } else {
               // Update password
               $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
               $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
               $stmt->bind_param("si", $hashed_password, $user_id);

               if ($stmt->execute()) {
                    $message = "Password updated successfully!";
                    $messageType = "success";
               } else {
                    $message = "Error updating password: " . $conn->error;
                    $messageType = "error";
               }

               $stmt->close();
          }
     }
}

// Function to send verification email for number change using PHPMailer
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

include("Nevigation.php");
?>

<div id="profile_management" class="p-6">
     <div class="max-w-4xl mx-auto">
          <div class="mb-8">
               <h1 class="text-2xl font-bold text-gray-800">Profile Settings</h1>
               <p class="text-sm text-gray-600 mt-1">Manage your account information and preferences</p>
          </div>

          <?php if (!empty($message)): ?>
               <div class="mb-4 p-4 rounded <?php echo $messageType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                    <?php echo $message; ?>
               </div>
          <?php endif; ?>

          <div class="flex items-center space-x-6 mb-6">
               <div class="relative">
                    <img src="../../public/profile/<?php echo htmlspecialchars($user['pic']); ?>" alt="Profile"
                         class="w-24 h-24 rounded-full border border-neutral-400 object-cover">
                    <form id="profilePicForm" action="update_profile_pic.php" method="post" enctype="multipart/form-data">
                         <input type="file" id="profilePicInput" name="profile_pic" class="hidden" accept="image/*">
                         <button type="button" onclick="document.getElementById('profilePicInput').click()"
                              class="absolute bottom-0 right-0 bg-white p-1.5 rounded-full border border-neutral-400 hover:bg-gray-50">
                              <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                              </svg>
                         </button>
                    </form>
               </div>
               <div>
                    <h3 class="text-lg font-medium text-gray-900">Profile Photo</h3>
                    <p class="text-sm text-gray-500">JPG, GIF or PNG. Max size of 800K</p>
               </div>
          </div>

          <!-- Profile Information Form -->
          <div class="bg-white rounded border border-neutral-200/20 mb-6">
               <div class="p-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                    <form method="post" id="profileForm">
                         <div class="space-y-4">
                              <div>
                                   <label class="block text-sm font-medium text-gray-700">Name</label>
                                   <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"
                                        class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                              </div>

                              <div>
                                   <label class="block text-sm font-medium text-gray-700">Email</label>
                                   <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
                                        class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 bg-gray-100" readonly>
                                   <p class="text-xs text-gray-500 mt-1">Email cannot be changed</p>
                              </div>

                              <div>
                                   <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                   <input type="tel" name="mobile_no" value="<?php echo htmlspecialchars($user['number']); ?>"
                                        class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                                   <p class="text-xs text-gray-500 mt-1">A verification email will be sent to confirm your phone number change</p>
                              </div>
                         </div>

                         <div class="flex justify-end mt-6">
                              <input type="hidden" name="update_profile" value="1">
                              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Profile Changes</button>
                         </div>
                    </form>
               </div>
          </div>

          <!-- Password Change Form -->
          <div class="bg-white rounded border border-neutral-200/20">
               <div class="p-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Change Password</h3>
                    <form method="post" id="passwordForm">
                         <div class="space-y-4">
                              <div>
                                   <label class="block text-sm font-medium text-gray-700">Current Password</label>
                                   <input type="password" name="current_password"
                                        class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                              </div>
                              <div>
                                   <label class="block text-sm font-medium text-gray-700">New Password</label>
                                   <input type="password" name="new_password"
                                        class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                                   <p class="text-xs text-gray-500 mt-1">Password must be at least 6 characters</p>
                              </div>
                              <div>
                                   <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                   <input type="password" name="confirm_password"
                                        class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                              </div>
                         </div>

                         <div class="flex justify-between mt-6">
                              <a href="../../app/controller/signout.php" type="button"
                                   class="px-4 py-2 border border-red-500 rounded text-red-500 hover:bg-red-500 hover:text-white">Logout</a>
                              <input type="hidden" name="change_password" value="1">
                              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Password</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

<script src="../../node_modules/toastify-js/src/toastify.js"></script>

<script>
     window.addEventListener('load', () => {
          const callToast = (message, type = "success") => {
               const toastMarkup = `
            <div class="flex p-4">
                <p class="text-sm ${type === "success" ? "text-green-700" : "text-red-700"}">${message}</p>
                <div class="ms-auto">
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                    </button>
                </div>
            </div>`;
               Toastify({
                    text: toastMarkup,
                    className: "hs-toastify-on:opacity-100 opacity-0 fixed -top-[150px] right-[20px] z-[90] transition-all duration-300 w-[320px] bg-white text-sm border rounded-xl shadow-lg [&>.toast-close]:hidden",
                    duration: 3000,
                    close: true,
                    escapeMarkup: false
               }).showToast();
          };

          // Profile form validation
          document.querySelector("#profileForm").addEventListener("submit", (event) => {
               event.preventDefault();

               const form = event.target;
               const name = form.name.value.trim();
               const mobile_no = form.mobile_no.value.trim();

               if (!name) {
                    callToast("Name is required.", "error");
                    return;
               }
               if (!mobile_no.match(/^\d{10}$/)) {
                    callToast("Mobile number must be 10 digits.", "error");
                    return;
               }

               form.submit();
          });

          // Password form validation
          document.querySelector("#passwordForm").addEventListener("submit", (event) => {
               event.preventDefault();

               const form = event.target;
               const current_password = form.current_password.value.trim();
               const new_password = form.new_password.value.trim();
               const confirm_password = form.confirm_password.value.trim();

               if (!current_password) {
                    callToast("Current password is required.", "error");
                    return;
               }
               if (!new_password) {
                    callToast("New password is required.", "error");
                    return;
               }
               if (new_password.length < 6) {
                    callToast("New password must be at least 6 characters.", "error");
                    return;
               }
               if (new_password !== confirm_password) {
                    callToast("New passwords do not match.", "error");
                    return;
               }

               form.submit();
          });

          // Handle profile picture upload
          const profilePicInput = document.getElementById('profilePicInput');
          if (profilePicInput) {
               profilePicInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                         const fileSize = this.files[0].size / 1024; // KB
                         if (fileSize > 800) {
                              callToast("File is too large. Maximum size is 800KB.", "error");
                              this.value = '';
                              return;
                         }

                         const formData = new FormData(document.getElementById('profilePicForm'));

                         fetch('update_profile_pic.php', {
                                   method: 'POST',
                                   body: formData
                              })
                              .then(response => response.json())
                              .then(data => {
                                   if (data.success) {
                                        callToast("Profile picture updated successfully", "success");
                                        // Update the profile image on the page
                                        document.querySelector('.rounded-full').src = '../../public/profile/' + data.filename + '?v=' + new Date().getTime();
                                   } else {
                                        callToast(data.message, "error");
                                   }
                              })
                              .catch(error => {
                                   callToast("Error updating profile picture", "error");
                              });
                    }
               });
          }

          // Check if we're returning from a verification link
          const urlParams = new URLSearchParams(window.location.search);
          if (urlParams.has('verify')) {
               // Scroll to top to show verification message
               window.scrollTo(0, 0);
          }
     });
</script>

<?php
include("Footer.php");
?>