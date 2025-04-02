<?php
$page_title = "Add Genre";
ob_start();

require_once("../../config/connection.php");
// Process form submission
$success_message = "";
$error_message = "";

// Handle genre deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_genre_id'])) {
    $genre_id = (int)$_POST['delete_genre_id'];

    // Delete the genre
    $delete_query = "DELETE FROM genres WHERE id = $genre_id";

    if (mysqli_query($conn, $delete_query)) {
        $success_message = "Genre deleted successfully";
    } else {
        $error_message = "Error deleting genre: " . mysqli_error($conn);
    }
}

// Handle genre editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_genre_id']) && isset($_POST['edit_genre_name'])) {
    $genre_id = (int)$_POST['edit_genre_id'];
    $genre_name = trim($_POST['edit_genre_name']);

    if (empty($genre_name)) {
        $error_message = "Genre name is required";
    } else {
        // Check if another genre with this name already exists
        $check_query = "SELECT * FROM genres WHERE genre_name = '$genre_name' AND id != $genre_id";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            $error_message = "Another genre with this name already exists";
        } else {
            // Update the genre
            $update_query = "UPDATE genres SET genre_name = '$genre_name' WHERE id = $genre_id";

            if (mysqli_query($conn, $update_query)) {
                $success_message = "Genre updated successfully";
            } else {
                $error_message = "Error updating genre: " . mysqli_error($conn);
            }
        }
    }
}

// Process form submission for adding genre
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['genre']) && !isset($_POST['edit_genre_id']) && !isset($_POST['delete_genre_id'])) {
    $genre = trim($_POST['genre']);

    if (empty($genre)) {
        $error_message = "Genre name is required";
    } else {
        // Check if genre already exists
        $genre = mysqli_real_escape_string($conn, $genre);
        $check_query = "SELECT * FROM genres WHERE genre_name = '$genre'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            $error_message = "Genre already exists";
        } else {
            // Insert the new genre
            $insert_query = "INSERT INTO genres (genre_name) VALUES ('$genre')";

            if (mysqli_query($conn, $insert_query)) {
                $success_message = "Genre added successfully";

                // Clear the form
                $_POST['genre'] = "";
            } else {
                $error_message = "Error: " . mysqli_error($conn);
            }
        }
    }
}

// Fetch all existing genres
$genres = [];
$fetch_query = "SELECT * FROM genres ORDER BY genre_name";
$result = mysqli_query($conn, $fetch_query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $genres[] = $row;
    }
}
?>
<div class="w-full flex flex-col items-center overflow-y-auto">
    <div class="mt-8 w-10/12">
        <h4 class="text-gray-600">
            Add Genre
        </h4>

        <div class="mt-4">
            <div class="p-6 bg-white rounded-md border border-gray-300 ">
                <h2 class="text-lg font-semibold text-gray-700 capitalize">
                    Add Genre
                </h2>

                <form method="post" action="">
                    <div class="gap-6 mt-4 sm:grid-cols-2">
                        <div class="flex justify-between items-center">
                            <div class="w-full">
                                <label class="text-gray-700" for="username">Category Name</label>
                                <input
                                    class="w-2/4 mt-2 pl-2 border h-8 border-gray-400 outline-none rounded-md focus:border-blue-600 focus:ring focus:ring-opacity-40 focus:ring-blue-500"
                                    type="text"
                                    name="genre"
                                    value="<?php echo isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : ''; ?>">
                            </div>
                            <button type="submit"
                                class="px-5 py-2 text-center border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-6 mt-10 bg-white rounded-md border border-gray-300">
            <?php if (empty($genres)): ?>
                <p class="text-gray-500">No genres available</p>
            <?php else: ?>
                <?php foreach ($genres as $genre): ?>
                    <div class="flex">
                        <ul class="mb-2">
                            <li class="inline-block text-lg"><?php echo htmlspecialchars($genre['genre_name']); ?></li>
                        </ul>
                        <div class="ml-auto">
                            <button onclick="openEditModal(<?php echo $genre['id']; ?>, '<?php echo htmlspecialchars($genre['genre_name'], ENT_QUOTES); ?>')"
                                class="py-1 ml-10 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500 focus:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400">
                                Edit
                            </button>
                            <button onclick="openDeleteModal(<?php echo $genre['id']; ?>, '<?php echo htmlspecialchars($genre['genre_name'], ENT_QUOTES); ?>')"
                                class="py-1 px-2 ml-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-500 text-red-500 hover:border-red-400 hover:text-red-400 focus:outline-none focus:border-red-400 focus:text-red-400 disabled:opacity-50 disabled:pointer-events-none">
                                Delete
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteGenreModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Confirm Delete</h3>
                <button onclick="document.getElementById('deleteGenreModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form method="post" action="">
                <input type="hidden" name="delete_genre_id" id="delete_genre_id">
                <p class="text-gray-700 mb-6">Are you sure you want to delete <span id="delete_genre_name" class="font-semibold"></span>? This action cannot be undone.</p>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('deleteGenreModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Genre Modal -->
    <div id="editGenreModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Edit Genre</h3>
                <button onclick="document.getElementById('editGenreModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form method="post" action="">
                <input type="hidden" name="edit_genre_id" id="edit_genre_id">
                <div class="mb-4">
                    <label for="edit_genre_name" class="block text-sm font-medium text-gray-700">Genre Name</label>
                    <input type="text" name="edit_genre_name" id="edit_genre_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('editGenreModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<script>
    function tostifyCustomClose(el) {
        const parent = el.closest('.toastify');
        const close = parent.querySelector('.toast-close');
        close.click();
    }

    function openDeleteModal(id, name) {
        document.getElementById('delete_genre_id').value = id;
        document.getElementById('delete_genre_name').textContent = name;
        document.getElementById('deleteGenreModal').classList.remove('hidden');
    }

    function openEditModal(id, name) {
        document.getElementById('edit_genre_id').value = id;
        document.getElementById('edit_genre_name').value = name;
        document.getElementById('editGenreModal').classList.remove('hidden');
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

        <?php if (!empty($success_message)): ?>
            callToast("<?php echo addslashes($success_message); ?>", "success");
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            callToast("<?php echo addslashes($error_message); ?>", "error");
        <?php endif; ?>

        const form = document.querySelector("form");
        form.addEventListener("submit", (event) => {
            const genreInput = form.querySelector('input[name="genre"]');

            // Only validate if this is the add genre form
            if (genreInput && !form.querySelector('input[name="edit_genre_id"]') && !form.querySelector('input[name="delete_genre_id"]')) {
                event.preventDefault(); // Prevent form submission

                const genre = genreInput.value.trim();

                if (!genre) {
                    callToast("Genre is required.", "error");
                    return;
                }

                // If all validations pass
                callToast("Form validated successfully. Submitting...");
                setTimeout(() => {
                    form.submit(); // Call this after any animations
                }, 100);
            }
        });
    });
</script>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>