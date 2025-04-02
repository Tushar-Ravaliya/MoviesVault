<?php
$page_title = "Edit Movie";
ob_start();
?>
<?php
require_once("../../config/connection.php");

// Check if movie ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_movies.php");
    exit;
}

$movie_id = intval($_GET['id']);

// Fetch existing movie data
$movie_data = null;
$movie_genres = [];
$movie_cast = [];

// Get movie details
$movie_sql = "SELECT * FROM movies WHERE movie_id = ?";
$stmt = $conn->prepare($movie_sql);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $movie_data = $result->fetch_assoc();

    // Get movie genres
    $genres_sql = "SELECT genre_name FROM movie_genres WHERE movie_id = ?";
    $genre_stmt = $conn->prepare($genres_sql);
    $genre_stmt->bind_param("i", $movie_id);
    $genre_stmt->execute();
    $genres_result = $genre_stmt->get_result();

    while ($genre_row = $genres_result->fetch_assoc()) {
        $movie_genres[] = $genre_row['genre_name'];
    }
    $genre_stmt->close();

    // Get movie cast
    $cast_sql = "SELECT * FROM movie_cast WHERE movie_id = ?";
    $cast_stmt = $conn->prepare($cast_sql);
    $cast_stmt->bind_param("i", $movie_id);
    $cast_stmt->execute();
    $cast_result = $cast_stmt->get_result();

    while ($cast_row = $cast_result->fetch_assoc()) {
        $movie_cast[] = $cast_row;
    }
    $cast_stmt->close();
} else {
    // Movie not found
    header("Location: manage_movies.php");
    exit;
}
$stmt->close();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Movie details processing
    $movie_title = $_POST['movie_title'];
    $release_date = $_POST['release_date'];
    $duration = $_POST['duration'];
    $age_rating = $_POST['age_rating'];
    $description = $_POST['description'];
    $genres = isset($_POST['genres']) ? $_POST['genres'] : [];

    // Handle movie poster upload
    $poster_path = $movie_data['poster_path']; // Keep existing poster by default
    if (isset($_FILES['movie_poster']) && $_FILES['movie_poster']['error'] == 0) {
        $target_dir = "../../public/Images/";
        $file_extension = pathinfo($_FILES["movie_poster"]["name"], PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["movie_poster"]["tmp_name"], $target_file)) {
            // If upload successful, update poster path
            $poster_path = $new_filename;

            // Delete old poster if it exists
            if (!empty($movie_data['poster_path'])) {
                $old_poster = $target_dir . $movie_data['poster_path'];
                if (file_exists($old_poster)) {
                    unlink($old_poster);
                }
            }
        }
    }

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Update movie details
        $sql = "UPDATE movies SET title = ?, release_date = ?, duration = ?, age_rating = ?, description = ?, poster_path = ? 
                WHERE movie_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssi", $movie_title, $release_date, $duration, $age_rating, $description, $poster_path, $movie_id);

        if ($stmt->execute()) {
            // Update genres - first delete existing
            $delete_genres_sql = "DELETE FROM movie_genres WHERE movie_id = ?";
            $delete_genres_stmt = $conn->prepare($delete_genres_sql);
            $delete_genres_stmt->bind_param("i", $movie_id);
            $delete_genres_stmt->execute();
            $delete_genres_stmt->close();

            // Insert new genres
            if (!empty($genres)) {
                $genre_sql = "INSERT INTO movie_genres (movie_id, genre_name) VALUES (?, ?)";
                $genre_stmt = $conn->prepare($genre_sql);

                foreach ($genres as $genre) {
                    $genre_stmt->bind_param("is", $movie_id, $genre);
                    $genre_stmt->execute();
                }
                $genre_stmt->close();
            }

            // Update cast - first delete existing
            $delete_cast_sql = "DELETE FROM movie_cast WHERE movie_id = ?";
            $delete_cast_stmt = $conn->prepare($delete_cast_sql);
            $delete_cast_stmt->bind_param("i", $movie_id);
            $delete_cast_stmt->execute();
            $delete_cast_stmt->close();

            // Insert updated cast members
            if (isset($_POST['cast_name']) && is_array($_POST['cast_name'])) {
                $cast_sql = "INSERT INTO movie_cast (movie_id, actor_name, role, character_name) VALUES (?, ?, ?, ?)";
                $cast_stmt = $conn->prepare($cast_sql);

                for ($i = 0; $i < count($_POST['cast_name']); $i++) {
                    if (!empty($_POST['cast_name'][$i])) {
                        $cast_name = $_POST['cast_name'][$i];
                        $cast_role = $_POST['cast_role'][$i];
                        $character_name = $_POST['character_name'][$i];

                        $cast_stmt->bind_param("isss", $movie_id, $cast_name, $cast_role, $character_name);
                        $cast_stmt->execute();
                    }
                }
                $cast_stmt->close();
            }

            // Commit transaction
            $conn->commit();
            $success_message = "Movie updated successfully!";

            // Refresh movie data after update
            header("Location: movieManagement.php?updated=1");
            exit;
        } else {
            throw new Exception("Error updating movie: " . $stmt->error);
        }

        $stmt->close();
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $error_message = $e->getMessage();
    }
}

// Check if we're returning after a successful update
if (isset($_GET['updated']) && $_GET['updated'] == 1) {
    $success_message = "Movie updated successfully!";
}
?>

<link rel="stylesheet" href="../../public/output.css">
<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<section id="editmovie" class="p-6 bg-white">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Movie</h1>
        <p class="text-gray-600 mt-1">Update the movie details below</p>
    </div>

    <?php if (isset($success_message)): ?>
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" id="movieForm" class="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Title</label>
                <input type="text" name="movie_title" id="movie_title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter movie title" value="<?php echo htmlspecialchars($movie_data['title']); ?>">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Release Date</label>
                <input type="date" name="release_date" id="release_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="<?php echo $movie_data['release_date']; ?>">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Duration (minutes)</label>
                <input type="number" name="duration" id="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter duration in minutes" value="<?php echo $movie_data['duration']; ?>">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Age Rating</label>
                <select name="age_rating" id="age_rating" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select rating</option>
                    <option value="U" <?php echo ($movie_data['age_rating'] == 'U') ? 'selected' : ''; ?>>U</option>
                    <option value="G" <?php echo ($movie_data['age_rating'] == 'G') ? 'selected' : ''; ?>>G</option>
                    <option value="PG" <?php echo ($movie_data['age_rating'] == 'PG') ? 'selected' : ''; ?>>PG</option>
                    <option value="PG-13" <?php echo ($movie_data['age_rating'] == 'PG-13') ? 'selected' : ''; ?>>PG-13</option>
                    <option value="R" <?php echo ($movie_data['age_rating'] == 'R') ? 'selected' : ''; ?>>R</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter movie description"><?php echo htmlspecialchars($movie_data['description']); ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Action" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" <?php echo in_array('Action', $movie_genres) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-sm text-gray-600">Action</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Comedy" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" <?php echo in_array('Comedy', $movie_genres) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-sm text-gray-600">Comedy</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Drama" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" <?php echo in_array('Drama', $movie_genres) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-sm text-gray-600">Drama</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="genres[]" value="Horror" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" <?php echo in_array('Horror', $movie_genres) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-sm text-gray-600">Horror</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Poster</label>
                <?php if (!empty($movie_data['poster_path'])): ?>
                    <div class="mb-2">
                        <img src="../../public/Images/<?php echo htmlspecialchars($movie_data['poster_path']); ?>" alt="Current poster" class="h-40 object-cover rounded">
                        <p class="text-xs text-gray-500 mt-1">Current poster</p>
                    </div>
                <?php endif; ?>
                <div class="flex items-center justify-center w-full">
                    <label class="w-full flex flex-col items-center px-4 py-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="mt-2 text-sm text-gray-500">Click to upload new poster</span>
                        <input type="file" name="movie_poster" id="movie_poster" class="hidden" accept="image/*">
                    </label>
                </div>
                <p class="text-xs text-gray-500 mt-1">Leave empty to keep current poster</p>
            </div>
        </div>

        <!-- Cast Members Section -->
        <div class="mt-8 md:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Cast Members</h2>
                <button type="button" id="addCastBtn" class="px-4 py-1.5 bg-green-600 rounded-lg hover:bg-green-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Cast Member
                </button>
            </div>

            <div id="castContainer" class="border border-gray-200 rounded-lg p-4 bg-gray-50 space-y-4">
                <?php if (empty($movie_cast)): ?>
                    <!-- Default empty cast member entry if none exist -->
                    <div class="cast-entry bg-white p-4 rounded-lg shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Actor/Actress Name</label>
                                <input type="text" name="cast_name[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                <select name="cast_role[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select role</option>
                                    <option value="Lead Actor">Lead Actor</option>
                                    <option value="Lead Actress">Lead Actress</option>
                                    <option value="Supporting Actor">Supporting Actor</option>
                                    <option value="Supporting Actress">Supporting Actress</option>
                                    <option value="Cameo">Cameo</option>
                                    <option value="Voice Actor">Voice Actor</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Character Name</label>
                                <input type="text" name="character_name[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter character name">
                            </div>
                        </div>
                        <button type="button" class="remove-cast-btn mt-3 text-sm text-red-600 hover:text-red-800 hidden">Remove</button>
                    </div>
                <?php else: ?>
                    <!-- Display existing cast members -->
                    <?php foreach ($movie_cast as $index => $cast): ?>
                        <div class="cast-entry bg-white p-4 rounded-lg shadow-sm">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Actor/Actress Name</label>
                                    <input type="text" name="cast_name[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter name" value="<?php echo htmlspecialchars($cast['actor_name']); ?>">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                    <select name="cast_role[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Select role</option>
                                        <option value="Lead Actor" <?php echo ($cast['role'] == 'Lead Actor') ? 'selected' : ''; ?>>Lead Actor</option>
                                        <option value="Lead Actress" <?php echo ($cast['role'] == 'Lead Actress') ? 'selected' : ''; ?>>Lead Actress</option>
                                        <option value="Supporting Actor" <?php echo ($cast['role'] == 'Supporting Actor') ? 'selected' : ''; ?>>Supporting Actor</option>
                                        <option value="Supporting Actress" <?php echo ($cast['role'] == 'Supporting Actress') ? 'selected' : ''; ?>>Supporting Actress</option>
                                        <option value="Cameo" <?php echo ($cast['role'] == 'Cameo') ? 'selected' : ''; ?>>Cameo</option>
                                        <option value="Voice Actor" <?php echo ($cast['role'] == 'Voice Actor') ? 'selected' : ''; ?>>Voice Actor</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Character Name</label>
                                    <input type="text" name="character_name[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter character name" value="<?php echo htmlspecialchars($cast['character_name']); ?>">
                                </div>
                            </div>
                            <button type="button" class="remove-cast-btn mt-3 text-sm text-red-600 hover:text-red-800 <?php echo ($index === 0) ? 'hidden' : ''; ?>">Remove</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <a href="manage_movies.php" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Movie</button>
        </div>
    </form>
</section>
<script>
    // JavaScript for form validation and cast management
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

        // Cast member management
        const addCastBtn = document.getElementById("addCastBtn");
        const castContainer = document.getElementById("castContainer");

        if (addCastBtn && castContainer) {
            // Function to handle removing cast members
            const handleRemoveCast = function() {
                const castEntries = document.querySelectorAll(".cast-entry");
                if (castEntries.length > 1) {
                    this.closest(".cast-entry").remove();
                } else {
                    callToast("You need at least one cast member entry.", "error");
                }
            };

            // Add event listeners to existing remove buttons
            document.querySelectorAll(".remove-cast-btn").forEach(btn => {
                btn.addEventListener("click", handleRemoveCast);
            });

            // Function to add new cast member entry
            addCastBtn.addEventListener("click", () => {
                const castEntries = document.querySelectorAll(".cast-entry");
                if (castEntries.length > 0) {
                    const newEntry = castEntries[0].cloneNode(true);

                    // Clear input values
                    newEntry.querySelectorAll("input").forEach(input => {
                        input.value = "";
                    });

                    // Reset select dropdown
                    newEntry.querySelector("select").selectedIndex = 0;

                    // Show remove button
                    const removeBtn = newEntry.querySelector(".remove-cast-btn");
                    removeBtn.classList.remove("hidden");

                    // Add event listener for remove button
                    removeBtn.addEventListener("click", handleRemoveCast);

                    castContainer.appendChild(newEntry);
                } else {
                    callToast("Error: No template cast entry found.", "error");
                }
            });
        } else {
            console.error("Cast management elements not found");
        }

        // Form validation
        const form = document.querySelector("#movieForm");
        if (form) {
            form.addEventListener("submit", (event) => {
                event.preventDefault(); // Prevent form submission

                // Retrieve form data
                const movieTitle = form.querySelector("input[name='movie_title']").value.trim();
                const releaseDate = form.querySelector("input[name='release_date']").value;
                const duration = form.querySelector("input[name='duration']").value.trim();
                const ageRating = form.querySelector("select[name='age_rating']").value;
                const description = form.querySelector("textarea[name='description']").value.trim();
                const genres = Array.from(form.querySelectorAll("input[name='genres[]']:checked"));

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

                // For edit form, poster is optional
                const poster = form.querySelector("input[name='movie_poster']").files[0];

                // Cast validation
                let castValid = true;
                const castNames = form.querySelectorAll("input[name='cast_name[]']");
                const castRoles = form.querySelectorAll("select[name='cast_role[]']");
                const characterNames = form.querySelectorAll("input[name='character_name[]']");

                for (let i = 0; i < castNames.length; i++) {
                    if (castNames[i].value.trim() === "") {
                        callToast("Actor/Actress name is required for all cast entries.", "error");
                        castValid = false;
                        break;
                    }

                    if (castRoles[i].value === "") {
                        callToast("Role selection is required for all cast entries.", "error");
                        castValid = false;
                        break;
                    }

                    if (characterNames[i].value.trim() === "") {
                        callToast("Character name is required for all cast entries.", "error");
                        castValid = false;
                        break;
                    }
                }

                if (!castValid) {
                    return;
                }

                // If all validations pass
                callToast("Form validated successfully. Submitting...");
                setTimeout(() => {
                    form.submit(); // Call this after any animations
                }, 100);
            });
        } else {
            console.error("Form element not found");
        }
    });
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>