<?php
$page_title = "Add Movie";
ob_start();
?>
<?php
include("../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $movie_title = filter_var($_POST['movie_title'], FILTER_SANITIZE_STRING);
    $release_date = $_POST['release_date'];
    $duration = filter_var($_POST['duration'], FILTER_SANITIZE_NUMBER_INT);
    $age_rating = $_POST['age_rating'];
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $genres = isset($_POST['genres']) ? implode(", ", $_POST['genres']) : '';
    $poster_name = '';

    // Handle file upload
    if (isset($_FILES['movie_poster']) && $_FILES['movie_poster']['error'] === UPLOAD_ERR_OK) {
        $poster_name = time() . '_' . basename($_FILES['movie_poster']['name']);
        $target_path = '../../public/posters/' . $poster_name;
        move_uploaded_file($_FILES['movie_poster']['tmp_name'], $target_path);
    }

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO movies (title, release_date, duration, age_rating, description, genres, poster) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepared statement failed: " . $conn->error);
    }

    $stmt->bind_param('ssissss', $movie_title, $release_date, $duration, $age_rating, $description, $genres, $poster_name);

    if ($stmt->execute()) {
        echo "<script>alert('Movie added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to add movie: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<link rel="stylesheet" href="../../public/output.css">
<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<section id="addmovie" class="p-6 bg-white">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Movie</h1>
        <p class="text-gray-600 mt-1">Enter the movie details below</p>
    </div>

    <form method="POST" enctype="multipart/form-data" id="movieForm" class="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Title</label>
                <input type="text" name="movie_title" id="movie_title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter movie title">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Release Date</label>
                <input type="date" name="release_date" id="release_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Duration (minutes)</label>
                <input type="number" name="duration" id="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter duration in minutes">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Age Rating</label>
                <select name="age_rating" id="age_rating" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select rating</option>
                    <option value="U">U</option>
                    <option value="G">G</option>
                    <option value="PG">PG</option>
                    <option value="PG-13">PG-13</option>
                    <option value="R">R</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter movie description"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Action" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Action</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Comedy" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Comedy</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Drama" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Drama</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Horror" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Horror</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Poster</label>
                <div class="flex items-center justify-center w-full">
                    <label class="w-full flex flex-col items-center px-4 py-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="mt-2 text-sm text-gray-500">Click to upload poster</span>
                        <input type="file" name="movie_poster" id="movie_poster" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Movie</button>
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