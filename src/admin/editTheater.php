<?php
$page_title = "Edit Theater";
ob_start();
?>
<?php
require_once("../../config/connection.php");

// Process form submission
session_start();

// Check if theater ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error_message'] = "No theater ID provided.";
    header("Location: http://localhost/moviesvault/src/admin/theaterManagement.php");
    exit();
}

$theater_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

// Fetch existing theater data
$theater = null;
if ($theater_id) {
    $get_theater_sql = "SELECT * FROM theaters WHERE id = ?";
    $stmt = mysqli_prepare($conn, $get_theater_sql);
    mysqli_stmt_bind_param($stmt, "i", $theater_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $theater = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error_message'] = "Theater not found.";
        header("Location: http://localhost/moviesvault/src/admin/theaterManagement.php");
        exit();
    }
    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $theater_title = htmlspecialchars(trim($_POST['theater_title'] ?? ''));
    $area = htmlspecialchars(trim($_POST['area'] ?? ''));
    $theater_rating = filter_var($_POST['theater_rating'] ?? 0, FILTER_VALIDATE_INT);
    $owner_name = htmlspecialchars(trim($_POST['owner_name'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Check if password is being updated
    $update_password = !empty($password);

    // If updating password, validate it matches and hash it
    if ($update_password) {
        if ($password === $confirm_password) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $_SESSION['error_message'] = "Passwords do not match.";
            header("Location: http://localhost/moviesvault/src/admin/edit_theater.php?id=" . $theater_id);
            exit();
        }
    }

    // Update theater data using MySQLi prepared statement
    if ($update_password) {
        $sql = "UPDATE theaters SET title = ?, area = ?, rating = ?, owner_name = ?, email = ?, password_hash = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssisssi", $theater_title, $area, $theater_rating, $owner_name, $email, $password_hash, $theater_id);
    } else {
        $sql = "UPDATE theaters SET title = ?, area = ?, rating = ?, owner_name = ?, email = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssissi", $theater_title, $area, $theater_rating, $owner_name, $email, $theater_id);
    }

    if ($stmt) {
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Theater updated successfully!";
            header("Location: http://localhost/moviesvault/src/admin/theaterManagement.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Error updating theater: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = "Database error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<link rel="stylesheet" href="../../public/output.css">
<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<section id="edittheater" class="p-6 bg-white">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Theater</h1>
        <p class="text-gray-600 mt-1">Update the theater details below</p>
    </div>

    <form method="POST" id="theaterForm" class="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Theater Information -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="theater_title">Theater Name*</label>
                <input type="text" name="theater_title" id="theater_title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter theater name" value="<?= htmlspecialchars($theater['title'] ?? '') ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="area">Area/Location*</label>
                <input type="text" name="area" id="area" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter theater location" value="<?= htmlspecialchars($theater['area'] ?? '') ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="theater_rating">Theater Rating*</label>
                <select name="theater_rating" id="theater_rating" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select rating</option>
                    <option value="1" <?= ($theater['rating'] ?? '') == 1 ? 'selected' : '' ?>>1 Star</option>
                    <option value="2" <?= ($theater['rating'] ?? '') == 2 ? 'selected' : '' ?>>2 Stars</option>
                    <option value="3" <?= ($theater['rating'] ?? '') == 3 ? 'selected' : '' ?>>3 Stars</option>
                    <option value="4" <?= ($theater['rating'] ?? '') == 4 ? 'selected' : '' ?>>4 Stars</option>
                    <option value="5" <?= ($theater['rating'] ?? '') == 5 ? 'selected' : '' ?>>5 Stars</option>
                </select>
            </div>

            <!-- Theater Owner Information -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="owner_name">Owner Name*</label>
                <input type="text" name="owner_name" id="owner_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter owner's full name" value="<?= htmlspecialchars($theater['owner_name'] ?? '') ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email Address*</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter contact email" value="<?= htmlspecialchars($theater['email'] ?? '') ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="password">Password (Leave blank to keep current)</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter new password" minlength="8">
                <p class="text-xs text-gray-500 mt-1">Minimum 8 characters with letters and numbers</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Confirm new password" minlength="8">
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button type="button" onclick="window.location.href='theaterManagement.php'" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Theater</button>
        </div>
    </form>
</section>

<script>
    // JavaScript for form validation
    function tostifyCustomClose(el) {
        const parent = el.closest('.toastify');
        const close = parent.querySelector('.toast-close');
        close.click();
    }

    window.addEventListener('load', () => {
        const callToast = (message, type = "success") => {
            const toastMarkup = `
            <div class="flex p-4">
                <p class="text-sm ${type === "success" ? "text-green-700" : "text-red-700"}">${message}</p>
                <div class="ms-auto">
                    <button onclick="tostifyCustomClose(this)" type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white" aria-label="Close">
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

        // Form validation
        const form = document.getElementById("theaterForm");
        form.addEventListener("submit", (event) => {
            event.preventDefault(); // Prevent form submission

            // Retrieve form data
            const theaterTitle = form.querySelector("#theater_title").value.trim();
            const area = form.querySelector("#area").value.trim();
            const theaterRating = form.querySelector("#theater_rating").value;
            const ownerName = form.querySelector("#owner_name").value.trim();
            const email = form.querySelector("#email").value.trim();
            const password = form.querySelector("#password").value;
            const confirmPassword = form.querySelector("#confirm_password").value;

            // Validation
            if (!theaterTitle) {
                callToast("Theater name is required.", "error");
                return;
            }

            if (!area) {
                callToast("Area/Location is required.", "error");
                return;
            }

            if (!theaterRating) {
                callToast("Please select a theater rating.", "error");
                return;
            }

            if (!ownerName) {
                callToast("Owner name is required.", "error");
                return;
            }

            if (!email) {
                callToast("Email address is required.", "error");
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                callToast("Please enter a valid email address.", "error");
                return;
            }

            // Password validation only if password field is not empty
            if (password) {
                // Password strength validation
                if (password.length < 8) {
                    callToast("Password must be at least 8 characters long.", "error");
                    return;
                }

                // Check if password contains at least one letter and one number
                const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d).+$/;
                if (!passwordRegex.test(password)) {
                    callToast("Password must contain at least one letter and one number.", "error");
                    return;
                }

                if (password !== confirmPassword) {
                    callToast("Passwords do not match.", "error");
                    return;
                }
            } else if (confirmPassword) {
                // If confirm password is filled but password is empty
                callToast("Please enter a password to confirm.", "error");
                return;
            }

            // If all validations pass
            callToast("Form validated successfully. Updating theater...");
            setTimeout(() => {
                form.submit(); // Submit the form
            }, 100);
        });

        // Show error messages from PHP if any
        <?php if (isset($_SESSION['error_message'])): ?>
            callToast("<?php echo $_SESSION['error_message']; ?>", "error");
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_message'])): ?>
            callToast("<?php echo $_SESSION['success_message']; ?>", "success");
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
    });
</script>


<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>