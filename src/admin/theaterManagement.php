<?php
$page_title = "Admin Dashboard";
ob_start();

// Database connection
require_once("../../config/connection.php");

// Search functionality
$search_term = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
}

// Pagination settings
$records_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Build the where clause for search
$where_clause = "";
if (!empty($search_term)) {
    $where_clause = " WHERE title LIKE '%$search_term%' OR area LIKE '%$search_term%'";
}

// Fetch total theaters count with search
$total_query = "SELECT COUNT(*) as total FROM theaters" . $where_clause;
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_theaters = $total_row['total'];
$total_pages = ceil($total_theaters / $records_per_page);

// Fetch theaters with pagination and search
$theaters_query = "SELECT * FROM theaters" . $where_clause . " ORDER BY title LIMIT $offset, $records_per_page";
$theaters_result = mysqli_query($conn, $theaters_query);

// Handle theater status toggle
if (isset($_POST['toggle_status'])) {
    $theater_id = (int)$_POST['theater_id'];
    $new_status = $_POST['new_status'] === 'active' ? 'inactive' : 'active';

    $update_query = "UPDATE theaters SET status = '$new_status' WHERE id = $theater_id";
    if (mysqli_query($conn, $update_query)) {
        // Keep search parameters when redirecting
        $search_param = !empty($search_term) ? "&search=" . urlencode($search_term) : "";
        header("Location: admin_dashboard.php?page=$page$search_param&status_updated=true");
        exit;
    }
}

// Status update message
if (isset($_GET['status_updated'])) {
    $status_message = "Theater status updated successfully.";
}
?>

<div id="theaters" class="p-6 bg-gray-50">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-900">Theater Management</h2>

        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <!-- Search Form -->
            <form action="" method="GET" class="flex flex-grow sm:flex-grow-0">
                <div class="relative flex-grow">
                    <input type="text"
                        name="search"
                        value="<?php echo htmlspecialchars($search_term); ?>"
                        placeholder="Search theaters..."
                        class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
                <?php if (!empty($search_term)): ?>
                    <a href="admin_dashboard.php" class="ml-2 py-2 px-4 text-gray-600 hover:text-gray-800">
                        Clear
                    </a>
                <?php endif; ?>
            </form>

            <a href="addTheater.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Theater
            </a>
        </div>
    </div>

    <?php if (isset($status_message)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo $status_message; ?></span>
        </div>
    <?php endif; ?>

    <?php if (!empty($search_term)): ?>
        <div class="mb-4">
            <p class="text-gray-700">
                Search results for: <span class="font-medium">"<?php echo htmlspecialchars($search_term); ?>"</span>
                (<?php echo $total_theaters; ?> result<?php echo $total_theaters !== 1 ? 's' : ''; ?>)
            </p>
        </div>
    <?php endif; ?>

    <!-- Theater List -->
    <div class="grid gap-6">
        <?php if (mysqli_num_rows($theaters_result) > 0): ?>
            <?php while ($theater = mysqli_fetch_assoc($theaters_result)): ?>
                <?php
                // Get screen count for this theater
                $screen_query = "SELECT COUNT(*) as screen_count FROM screens WHERE theater_id = {$theater['id']} AND status = 'active'";
                $screen_result = mysqli_query($conn, $screen_query);
                $screen_row = mysqli_fetch_assoc($screen_result);
                $screen_count = $screen_row['screen_count'];

                // Get total seats
                $seats_query = "SELECT SUM(seating_capacity) as total_seats FROM screens WHERE theater_id = {$theater['id']} AND status = 'active'";
                $seats_result = mysqli_query($conn, $seats_query);
                $seats_row = mysqli_fetch_assoc($seats_result);
                $total_seats = $seats_row['total_seats'] ? $seats_row['total_seats'] : 0;

                // Get today's shows count
                $today = date('Y-m-d');
                $shows_query = "SELECT COUNT(*) as today_shows FROM showtimes WHERE theater_id = {$theater['id']} AND showtime_date = '$today' AND status = 'active'";
                $shows_result = mysqli_query($conn, $shows_query);
                $shows_row = mysqli_fetch_assoc($shows_result);
                $today_shows = $shows_row['today_shows'];
                ?>
                <!-- Theater Card -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900"><?php echo htmlspecialchars($theater['title']); ?></h3>
                                <p class="text-sm text-gray-600 mt-1"><?php echo htmlspecialchars($theater['area']); ?></p>
                            </div>
                            <form method="POST" action="">
                                <input type="hidden" name="theater_id" value="<?php echo $theater['id']; ?>">
                                <input type="hidden" name="new_status" value="<?php echo $theater['status']; ?>">
                                <button type="submit" name="toggle_status" class="px-3 py-1 text-sm font-semibold <?php echo $theater['status'] === 'active' ? 'text-green-800 bg-green-100' : 'text-red-800 bg-red-100'; ?> rounded-full">
                                    <?php echo ucfirst($theater['status']); ?>
                                </button>
                            </form>
                        </div>

                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-600">Total Screens</p>
                                <p class="text-xl font-semibold text-gray-900"><?php echo $screen_count; ?></p>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-600">Total Seats</p>
                                <p class="text-xl font-semibold text-gray-900"><?php echo number_format($total_seats); ?></p>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-600">Today's Shows</p>
                                <p class="text-xl font-semibold text-gray-900"><?php echo $today_shows; ?></p>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <a href="editTheater.php?id=<?php echo $theater['id']; ?>" class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit Details
                            </a>
                            <a href="screens.php?theater_id=<?php echo $theater['id']; ?>" class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Manage Screens
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="bg-white p-6 rounded-lg border border-gray-200 text-center">
                <?php if (!empty($search_term)): ?>
                    <p class="text-gray-600">No theaters found matching your search. Try different keywords or <a href="admin_dashboard.php" class="text-blue-600 hover:underline">view all theaters</a>.</p>
                <?php else: ?>
                    <p class="text-gray-600">No theaters found in database. Click "Add New Theater" to create one.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium"><?php echo $offset + 1; ?></span> to <span class="font-medium"><?php echo min($offset + $records_per_page, $total_theaters); ?></span> of <span class="font-medium"><?php echo $total_theaters; ?></span> theaters
                    </p>
                </div>
                <div class="flex gap-2">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?><?php echo !empty($search_term) ? '&search=' . urlencode($search_term) : ''; ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                    <?php endif; ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?><?php echo !empty($search_term) ? '&search=' . urlencode($search_term) : ''; ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>