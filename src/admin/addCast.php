<?php
$page_title = "Add Cast Member";
ob_start();
?>
<?php
require_once("../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);
    $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $birthplace = filter_var($_POST['birthplace'], FILTER_SANITIZE_STRING);
    $photo_name = '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_name = time() . '_' . basename($_FILES['photo']['name']);
        $target_path = '../../public/photos/' . $photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
    }

    $stmt = $conn->prepare("INSERT INTO cast (name, role, age, gender, birthdate, birthplace, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepared statement failed: " . $conn->error);
    }

    $stmt->bind_param('ssissss', $name, $role, $age, $gender, $birthdate, $birthplace, $photo_name);

    if ($stmt->execute()) {
        echo "<script>alert('Cast member added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to add cast member: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<link rel="stylesheet" href="../../public/output.css">
<section id="addcast" class="p-6 bg-white">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Cast Member</h1>
        <p class="text-gray-600 mt-1">Enter the cast member details below</p>
    </div>

    <form method="POST" enctype="multipart/form-data" id="castForm" class="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter name">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <input type="text" name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter role">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                <input type="number" name="age" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter age">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                <select name="gender" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Birthdate</label>
                <input type="date" name="birthdate" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Birthplace</label>
                <input type="text" name="birthplace" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter birthplace">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                <input type="file" name="photo" class="w-full px-4 py-2 border border-gray-300 rounded-lg" accept="image/*">
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Cast Member</button>
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

        const form = document.querySelector("#movieForm");
        form.addEventListener("submit", (event) => {
            event.preventDefault(); // Prevent form submission

            // Retrieve form data
            const movieTitle = form.querySelector("input[name='movie_title']").value.trim();
            const releaseDate = form.querySelector("input[name='release_date']").value;
            const duration = form.querySelector("input[name='duration']").value.trim();
            const ageRating = form.querySelector("select[name='age_rating']").value;
            const description = form.querySelector("textarea[name='description']").value.trim();
            const genres = Array.from(form.querySelectorAll("input[name='genres[]']:checked"));
            const poster = form.querySelector("input[name='movie_poster']").files[0];

            // Validation
            if (!movieTitle) {
                callToast("Movie title is required.", "error");
                return;
            }

            if (!releaseDate) {
                callToast("Release date is required.", "error");
                return;
            }

            if (!duration || isNaN(duration) || parseInt(duration) <= 0) {
                callToast("Please provide a valid duration in minutes.", "error");
                return;
            }

            if (!ageRating) {
                callToast("Please select an age rating.", "error");
                return;
            }

            if (!description) {
                callToast("Movie description is required.", "error");
                return;
            }

            if (genres.length === 0) {
                callToast("Please select at least one genre.", "error");
                return;
            }

            if (!poster) {
                callToast("Please upload a movie poster.", "error");
                return;
            }

            // If all validations pass
            callToast("Form validated successfully. Submitting...");
            setTimeout(() => {
                form.submit(); // Call this after any animations
            }, 100);
        });
    });
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>