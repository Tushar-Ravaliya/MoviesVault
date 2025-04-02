<?php
$page_title = "Add Movie";
ob_start();
?>
<?php
require_once("../../config/connection.php");

// Query to fetch all genres
$sql = "SELECT * FROM genres";
$fetched_genres = mysqli_query($conn, $sql);


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Movie details processing (your existing validation would go here)
    $movie_title = $_POST['movie_title'];
    $release_date = $_POST['release_date'];
    $duration = $_POST['duration'];
    $age_rating = $_POST['age_rating'];
    $description = $_POST['description'];
    $genres = isset($_POST['genres']) ? $_POST['genres'] : [];

    // Handle movie poster upload
    $poster_path = null;
    if (isset($_FILES['movie_poster']) && $_FILES['movie_poster']['error'] == 0) {
        $target_dir = "../../public/Images/";
        $file_extension = pathinfo($_FILES["movie_poster"]["name"], PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["movie_poster"]["tmp_name"], $target_file)) {
            $poster_path = $new_filename;
        }
    }

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Insert movie details
        $sql = "INSERT INTO movies (title, release_date, duration, age_rating, description, poster_path) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisss", $movie_title, $release_date, $duration, $age_rating, $description, $poster_path);

        if ($stmt->execute()) {
            $movie_id = $conn->insert_id;

            // Insert genres
            if (!empty($genres)) {
                $genre_sql = "INSERT INTO movie_genres (movie_id, genre_name) VALUES (?, ?)";
                $genre_stmt = $conn->prepare($genre_sql);

                foreach ($genres as $genre) {
                    $genre_stmt->bind_param("is", $movie_id, $genre);
                    $genre_stmt->execute();
                }
                $genre_stmt->close();
            }

            // Process cast members
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
            $success_message = "Movie added successfully!";
        } else {
            throw new Exception("Error adding movie: " . $stmt->error);
        }

        $stmt->close();
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $error_message = $e->getMessage();
    }
}
?>

<link rel="stylesheet" href="../../public/output.css">
<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<section id="addmovie" class="p-6 bg-white">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Movie</h1>
        <p class="text-gray-600 mt-1">Enter the movie details below</p>
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

                    <?php
                    // Check if records exist
                    if (mysqli_num_rows($fetched_genres) > 0) {
                        while ($row = mysqli_fetch_assoc($fetched_genres)) {
                    ?>
                            <label class="flex items-center">
                                <input type="checkbox" name="genres[]" value="<?php echo $row['genre_name']; ?>" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-600"><?php echo $row['genre_name']; ?></span>
                            </label>
                    <?php
                        }
                    } else {
                        echo "No genres found.";
                    }
                    ?>
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

        <!-- Cast Members Section -->
        <div class="mt-8 md:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Cast Members</h2>
                <button type="button" id="addCastBtn" class="px-4 py-1.5 bg-green-600  rounded-lg hover:bg-green-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Cast Member
                </button>
            </div>

            <div id="castContainer" class="border border-gray-200 rounded-lg p-4 bg-gray-50 space-y-4">
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
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Movie</button>
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