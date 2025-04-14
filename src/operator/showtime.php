<?php
session_start();
$page_title = "Admin Dashboard";
ob_start();

require_once("../../config/connection.php");


// Process form submission for adding a new showtime
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $conn->real_escape_string($_POST['movie']);
    $showtime_date = $conn->real_escape_string($_POST['show_date']);
    $showtime_time = $conn->real_escape_string($_POST['show_time']);
    $theater_id = $_SESSION['theater_id'];
    $screen_id = $conn->real_escape_string($_POST['screen']);
    $price = $conn->real_escape_string($_POST['price']);

    // Validate inputs
    if (empty($movie_id) || empty($showtime_date) || empty($showtime_time) || empty($theater_id) || empty($screen_id) || empty($price)) {
        $error = "All fields are required.";
    } else {
        // Create a showtime table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS `showtimes` (
            `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `movie_id` int NOT NULL,
            `theater_id` int NOT NULL,
            `screen_id` int NOT NULL,
            `showtime_date` date NOT NULL,
            `showtime_time` time NOT NULL,
            `price` decimal(10,2) NOT NULL,
            `status` enum('active','cancelled') NOT NULL DEFAULT 'active',
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (`movie_id`) REFERENCES `movies`(`movie_id`),
            FOREIGN KEY (`theater_id`) REFERENCES `theaters`(`id`),
            FOREIGN KEY (`screen_id`) REFERENCES `screens`(`id`)
        )";

        if ($conn->query($sql) === TRUE) {
            // Insert the new showtime
            $insert_sql = "INSERT INTO showtimes (movie_id, theater_id, screen_id, showtime_date, showtime_time, price) 
                           VALUES ('$movie_id', '$theater_id', '$screen_id', '$showtime_date', '$showtime_time', '$price')";

            if ($conn->query($insert_sql) === TRUE) {
                $success = "New showtime added successfully.";
            } else {
                $error = "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        } else {
            $error = "Error creating table: " . $conn->error;
        }
    }
}

// Fetch all theaters
$sql = "SELECT * FROM theaters WHERE id = ? AND status = 'Active'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['theater_id']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $theaters[] = $row;
    }
}

// Get movies for dropdown
$movies = [];
$movies_result = $conn->query("SELECT movie_id, title, duration, age_rating FROM movies");
if ($movies_result->num_rows > 0) {
    while ($row = $movies_result->fetch_assoc()) {
        $movies[] = $row;
    }
}

// Get screens for dropdown (will be loaded dynamically based on theater selection)
$screens = [];

// Get date range for navigation
$dates = [];
$current_date = date('Y-m-d');
for ($i = 0; $i < 7; $i++) {
    $date = date('Y-m-d', strtotime($current_date . " + $i days"));
    $dates[] = [
        'date' => $date,
        'day_name' => ($i == 0) ? 'Today' : date('l', strtotime($date)),
        'day_number' => date('M j', strtotime($date))
    ];
}

// Fetch screens for the selected theater
$screens = [];
$query = "SELECT id, screen_name, screen_type, seating_capacity FROM screens WHERE theater_id = ? AND status = \"Active\"";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['theater_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $screens[] = $row;
    }
}
// Get selected date (default to today)
$selected_date = isset($_GET['date']) ? $_GET['date'] : $current_date;
$selected_theater = isset($_GET['theater']) ? $_GET['theater'] : '';
$selected_movie = isset($_GET['movie']) ? $_GET['movie'] : '';

// Fetch showtimes for the selected date
$showtime_query = "SELECT s.*, m.title as movie_title, m.duration, m.age_rating, m.poster_path, 
                   t.title as theater_name, scr.screen_name, scr.seating_capacity 
                   FROM showtimes s 
                   JOIN movies m ON s.movie_id = m.movie_id 
                   JOIN theaters t ON s.theater_id = t.id 
                   JOIN screens scr ON s.screen_id = scr.id 
                   WHERE s.showtime_date = '$selected_date'";

if (!empty($selected_theater)) {
    $showtime_query .= " AND s.theater_id = '$selected_theater'";
}

if (!empty($selected_movie)) {
    $showtime_query .= " AND s.movie_id = '$selected_movie'";
}

$showtime_query .= " ORDER BY t.title, scr.screen_name, s.showtime_time";
$showtimes_result = $conn->query($showtime_query);

// Group showtimes by theater and screen
$grouped_showtimes = [];
if ($showtimes_result->num_rows > 0) {
    while ($row = $showtimes_result->fetch_assoc()) {
        $theater_id = $row['theater_id'];
        $screen_id = $row['screen_id'];

        if (!isset($grouped_showtimes[$theater_id])) {
            $grouped_showtimes[$theater_id] = [
                'theater_name' => $row['theater_name'],
                'screens' => []
            ];
        }

        if (!isset($grouped_showtimes[$theater_id]['screens'][$screen_id])) {
            $grouped_showtimes[$theater_id]['screens'][$screen_id] = [
                'screen_name' => $row['screen_name'],
                'seating_capacity' => $row['seating_capacity'],
                'movies' => []
            ];
        }

        $movie_id = $row['movie_id'];
        if (!isset($grouped_showtimes[$theater_id]['screens'][$screen_id]['movies'][$movie_id])) {
            $grouped_showtimes[$theater_id]['screens'][$screen_id]['movies'][$movie_id] = [
                'movie_title' => $row['movie_title'],
                'duration' => $row['duration'],
                'age_rating' => $row['age_rating'],
                'poster_path' => $row['poster_path'],
                'showtimes' => []
            ];
        }

        $grouped_showtimes[$theater_id]['screens'][$screen_id]['movies'][$movie_id]['showtimes'][] = [
            'id' => $row['id'],
            'time' => date('g:i A', strtotime($row['showtime_time'])),
            'price' => $row['price'],
            'status' => $row['status']
        ];
    }
}
?>

<div id="showtimes" class=" space-y-6 lg:ml-64 p-5">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-neutral-900">Showtime Management</h2>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center" onclick="document.getElementById('addShowtimeModal').classList.remove('hidden')">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Showtime
        </button>
    </div>

    <!-- Notification Messages -->
    <?php if (isset($success)): ?>
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?php echo $success; ?></span>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?php echo $error; ?></span>
        </div>
    <?php endif; ?>

    <!-- Filters and Date Selection -->
    <div class="bg-white p-4 rounded-lg border border-neutral-200/30 space-y-4">
        <form method="GET" action="" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-neutral-600 mb-1">Select Theater</label>
                <select name="theater" class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                    <option value="">All Theaters</option>
                    <?php foreach ($theaters as $theater): ?>
                        <option value="<?php echo $theater['id']; ?>" <?php echo ($selected_theater == $theater['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($theater['title']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-neutral-600 mb-1">Select Movie</label>
                <select name="movie" class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                    <option value="">All Movies</option>
                    <?php foreach ($movies as $movie): ?>
                        <option value="<?php echo $movie['movie_id']; ?>" <?php echo ($selected_movie == $movie['movie_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($movie['title']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>

        <!-- Date Navigation -->
        <div class="flex items-center space-x-4 overflow-x-auto py-2">
            <?php foreach ($dates as $index => $date_info): ?>
                <a href="?date=<?php echo $date_info['date']; ?>&theater=<?php echo $selected_theater; ?>&movie=<?php echo $selected_movie; ?>"
                    class="flex flex-col items-center min-w-[100px] p-3 rounded-lg <?php echo ($selected_date == $date_info['date']) ? 'bg-blue-50 text-blue-600' : 'hover:bg-neutral-50'; ?>">
                    <span class="text-sm font-medium"><?php echo $date_info['day_name']; ?></span>
                    <span class="text-lg font-semibold"><?php echo $date_info['day_number']; ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Showtimes Grid -->
    <div class="space-y-6">
        <?php if (empty($grouped_showtimes)): ?>
            <div class="bg-white rounded-lg border border-neutral-200/30 p-6 text-center">
                <p class="text-neutral-600">No showtimes available for the selected filters.</p>
            </div>
        <?php else: ?>
            <?php foreach ($grouped_showtimes as $theater_id => $theater_data): ?>
                <?php foreach ($theater_data['screens'] as $screen_id => $screen_data): ?>
                    <div class="bg-white rounded-lg border border-neutral-200/30">
                        <div class="p-4 border-b border-neutral-200/30">
                            <h3 class="font-semibold text-lg text-neutral-900"><?php echo htmlspecialchars($theater_data['theater_name']); ?> - <?php echo htmlspecialchars($screen_data['screen_name']); ?></h3>
                            <p class="text-sm text-neutral-600">Capacity: <?php echo $screen_data['seating_capacity']; ?> seats</p>
                        </div>
                        <div class="p-4 space-y-4">
                            <?php foreach ($screen_data['movies'] as $movie_id => $movie_data): ?>
                                <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                                    <img src="<?php echo !empty($movie_data['poster_path']) ? '../../public/Images/' . htmlspecialchars($movie_data['poster_path']) : 'https://placehold.co/300x450'; ?>"
                                        alt="Movie Poster" class="w-20 h-28 rounded object-cover">
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-neutral-900"><?php echo htmlspecialchars($movie_data['movie_title']); ?></h4>
                                                <p class="text-sm text-neutral-600"><?php echo floor($movie_data['duration'] / 60) . 'h ' . ($movie_data['duration'] % 60) . 'm'; ?> • <?php echo htmlspecialchars($movie_data['age_rating']); ?></p>
                                            </div>
                                            <div class="flex space-x-2">
                                                <?php foreach ($movie_data['showtimes'] as $showtime): ?>
                                                    <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100"
                                                        onclick="editShowtime(<?php echo $showtime['id']; ?>)">Edit</button>
                                                    <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100"
                                                        onclick="cancelShowtime(<?php echo $showtime['id']; ?>)">Cancel</button>
                                                    <?php break; // Only show buttons once per movie 
                                                    ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            <?php foreach ($movie_data['showtimes'] as $showtime): ?>
                                                <?php
                                                $status_class = 'bg-green-100 text-green-600';
                                                if ($showtime['status'] === 'cancelled') {
                                                    $status_class = 'bg-red-100 text-red-600';
                                                }
                                                ?>
                                                <span class="px-3 py-1 <?php echo $status_class; ?> rounded-full text-sm">
                                                    <?php echo $showtime['time']; ?> (₹<?php echo number_format($showtime['price'], 2); ?>)
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Add Showtime Modal -->
<div id="addShowtimeModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 lg:w-1/2 shadow-lg rounded-lg bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Add New Movie Showtime</h3>
            <button onclick="document.getElementById('addShowtimeModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="showtimeForm" class="space-y-4" method="POST" action="">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Movie</label>
                <select name="movie" id="movie" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="">Select Movie</option>
                    <?php foreach ($movies as $movie): ?>
                        <option value="<?php echo $movie['movie_id']; ?>">
                            <?php echo htmlspecialchars($movie['title']); ?> (<?php echo floor($movie['duration'] / 60) . 'h ' . ($movie['duration'] % 60) . 'm'; ?>, <?php echo $movie['age_rating']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Show Date</label>
                    <input name="show_date" type="date" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="w-full ml-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Show Time</label>
                    <input name="show_time" type="time" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select Theater</label>
                    <select name="theater" id="theater" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2" onchange="loadScreens()">
                        <option value="">Select Theater</option>
                        <?php foreach ($theaters as $theater): ?>
                            <option value="<?php echo $theater['id']; ?>" selected>
                                <?php echo htmlspecialchars($theater['title']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="w-full ml-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select Screen</label>
                    <select name="screen" id="screen" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Select Theater First</option>
                        <?php foreach ($screens as $screen): ?>
                            <option value="<?php echo $screen['id']; ?>" >
                                <?php echo htmlspecialchars($screen['screen_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ticket Price</label>
                <input name="price" type="number" step="0.01" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter ticket price">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="document.getElementById('addShowtimeModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Showtime</button>
            </div>
        </form>
    </div>
</div>

<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<script>
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

        // Form validation now handled by server-side code
    });
    // Function to edit showtime
    function editShowtime(showtimeId) {
        // Redirect to edit page with the showtime ID
        window.location.href = `edit_showtime.php?id=${showtimeId}`;
    }

    // Function to cancel showtime
    function cancelShowtime(showtimeId) {
        if (confirm('Are you sure you want to cancel this showtime?')) {
            // Send AJAX request to cancel showtime
            fetch('cancel_showtime.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `showtime_id=${showtimeId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        callToast(data.message, "success");
                        // Reload page after a short delay
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    } else {
                        // Show error message
                        callToast(data.message, "error");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    callToast("An error occurred while cancelling the showtime.", "error");
                });
        }
    }
</script>

<?php
// Create a separate PHP file for AJAX requests
// get_screens.php
ob_start();
?>

<?php
$get_screens_content = '<?php
// get_screens.php - Returns screens for a specific theater in JSON format
require_once("../../config/connection.php");

// Check if theater_id is provided
if (!isset($_GET["theater_id"]) || empty($_GET["theater_id"])) {
    echo json_encode([]);
    exit;
}

// Sanitize the input
$theater_id = intval($_GET["theater_id"]);

// Fetch screens for the selected theater
$screens = [];
$query = "SELECT id, screen_name, screen_type, seating_capacity FROM screens WHERE theater_id = ? AND status = \"Active\"";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $theater_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $screens[] = $row;
    }
}

// Return the screens as JSON
header("Content-Type: application/json");
echo json_encode($screens);

// Close the connection
$stmt->close();
$conn->close();
?>';

file_put_contents("get_screens.php", $get_screens_content);

// Close the database connection
$conn->close();

$content = ob_get_clean();
include 'operator_layout.php';
?>