<?php
session_start();
require_once("../../config/connection.php");

$page_title = "Admin Dashboard";
$movies_per_page = 8; // Number of movies per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $movies_per_page;

// Get filters from URL parameters
$search = isset($_GET['search']) ? $_GET['search'] : '';
$genre_filter = isset($_GET['genre']) ? $_GET['genre'] : '';
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

// Get all available genres for the dropdown
$genre_query = "SELECT DISTINCT genre_name FROM genres ORDER BY genre_name";
$genre_result = $conn->query($genre_query);
$genres = [];
while ($genre_row = $genre_result->fetch_assoc()) {
    $genres[] = $genre_row['genre_name'];
}

// Build the movie query with filters
$count_query = "SELECT COUNT(DISTINCT m.movie_id) as total FROM movies m 
                LEFT JOIN movie_genres g ON m.movie_id = g.movie_id
                LEFT JOIN movie_cast c ON m.movie_id = c.movie_id
                WHERE 1=1";

$movie_query = "SELECT m.*, 
                GROUP_CONCAT(DISTINCT g.genre_name SEPARATOR ', ') as genres,
                CASE 
                    WHEN m.release_date > CURDATE() THEN 'Coming Soon'
                    WHEN m.release_date <= CURDATE() AND DATE_ADD(m.release_date, INTERVAL 30 DAY) >= CURDATE() THEN 'Now Showing'
                    ELSE 'Ended'
                END as status
                FROM movies m
                LEFT JOIN movie_genres g ON m.movie_id = g.movie_id
                WHERE 1=1";

$params = [];
$types = "";

// Add search filter if provided
if (!empty($search)) {
    $search_term = "%$search%";
    $search_filter = " AND (m.title LIKE ? OR EXISTS (SELECT 1 FROM movie_genres g2 WHERE g2.movie_id = m.movie_id AND g2.genre_name LIKE ?) 
                      OR EXISTS (SELECT 1 FROM movie_cast c2 WHERE c2.movie_id = m.movie_id AND (c2.actor_name LIKE ? OR c2.character_name LIKE ?)))";
    $count_query .= $search_filter;
    $movie_query .= $search_filter;
    $params[] = $search_term;
    $params[] = $search_term;
    $params[] = $search_term;
    $params[] = $search_term;
    $types .= "ssss";
}

// Add genre filter if provided
if (!empty($genre_filter)) {
    $genre_filter_sql = " AND EXISTS (SELECT 1 FROM movie_genres g3 WHERE g3.movie_id = m.movie_id AND g3.genre_name = ?)";
    $count_query .= $genre_filter_sql;
    $movie_query .= $genre_filter_sql;
    $params[] = $genre_filter;
    $types .= "s";
}

// Add status filter if provided
if (!empty($status_filter)) {
    $status_filter_sql = " AND (CASE 
                            WHEN m.release_date > CURDATE() THEN 'Coming Soon'
                            WHEN m.release_date <= CURDATE() AND DATE_ADD(m.release_date, INTERVAL 30 DAY) >= CURDATE() THEN 'Now Showing'
                            ELSE 'Ended'
                        END) = ?";
    $count_query .= $status_filter_sql;
    $movie_query .= $status_filter_sql;
    $params[] = $status_filter;
    $types .= "s";
}

// Finish building the movie query with group by
$movie_query .= " GROUP BY m.movie_id ORDER BY m.release_date DESC";

// Execute count query
$total_movies = 0;
if (!empty($params)) {
    $count_stmt = $conn->prepare($count_query);

    // Use call_user_func_array for dynamic binding
    if (!empty($types)) {
        $bind_params = array_merge([$types], $params);
        $count_stmt->bind_param(...$bind_params);
    }

    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $count_row = $count_result->fetch_assoc();
    $total_movies = $count_row['total'];
    $count_stmt->close();
} else {
    $count_result = $conn->query($count_query);
    $count_row = $count_result->fetch_assoc();
    $total_movies = $count_row['total'];
}

$total_pages = ceil($total_movies / $movies_per_page);

// Add pagination parameters to movie query
$movie_query .= " LIMIT ? OFFSET ?";
$params[] = $movies_per_page;
$params[] = $offset;
$types .= "ii";

// Execute movie query
$movies = [];
$movie_stmt = $conn->prepare($movie_query);

if (!empty($params)) {
    // Use splat operator (...) for PHP 7.4+ or call_user_func_array for older versions
    $bind_params = array_merge([$types], $params);
    $movie_stmt->bind_param(...$bind_params);
}

$movie_stmt->execute();
$movies_result = $movie_stmt->get_result();

while ($movie = $movies_result->fetch_assoc()) {
    $movies[] = $movie;
}

$movie_stmt->close();

ob_start();
?>
<div id="movies" class="p-6 space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-neutral-900">Movie Management</h2>
       
    </div>

    <!-- Filters -->
    <form action="" method="GET" class="bg-white p-4 rounded-lg border border-neutral-200/30 flex flex-wrap gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-sm font-medium text-neutral-600 mb-1">Search Movies</label>
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by title, genre, or cast..." class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-neutral-600 mb-1">Genre</label>
            <select name="genre" class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">All Genres</option>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo htmlspecialchars($genre); ?>" <?php echo $genre_filter == $genre ? 'selected' : ''; ?>><?php echo htmlspecialchars($genre); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-neutral-600 mb-1">Status</label>
            <select name="status" class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">All Status</option>
                <option value="Now Showing" <?php echo $status_filter == 'Now Showing' ? 'selected' : ''; ?>>Now Showing</option>
                <option value="Coming Soon" <?php echo $status_filter == 'Coming Soon' ? 'selected' : ''; ?>>Coming Soon</option>
                <option value="Ended" <?php echo $status_filter == 'Ended' ? 'selected' : ''; ?>>Ended</option>
            </select>
        </div>
        <div class="self-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Filter</button>
        </div>
    </form>

    <?php if (empty($movies)): ?>
        <div class="bg-white p-6 rounded-lg border border-neutral-200/30 text-center">
            <p class="text-neutral-600">No movies found matching your criteria.</p>
        </div>
    <?php else: ?>
        <!-- Movies Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($movies as $movie): ?>
                <!-- Movie Card -->
                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                    <img src="<?php echo !empty($movie['poster_path']) ? '../../public/Images/' . htmlspecialchars($movie['poster_path']) : 'public/Images/default-poster.jpg'; ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-neutral-900"><?php echo htmlspecialchars($movie['title']); ?></h3>
                            <span class="px-2 py-1 text-xs 
                        <?php
                        if ($movie['status'] == 'Now Showing') echo 'bg-green-100 text-green-600';
                        else if ($movie['status'] == 'Coming Soon') echo 'bg-blue-100 text-blue-600';
                        else echo 'bg-neutral-100 text-neutral-600';
                        ?> rounded-full"><?php echo htmlspecialchars($movie['status']); ?></span>
                        </div>
                        <p class="text-sm text-neutral-600 mb-3"><?php echo htmlspecialchars($movie['genres']); ?></p>
                        <div class="flex items-center justify-between text-sm mb-3">
                            <span class="text-neutral-600">Duration: <?php echo floor($movie['duration'] / 60) . 'h ' . ($movie['duration'] % 60) . 'm'; ?></span>
                            <span class="text-neutral-600">Rating: <?php echo htmlspecialchars($movie['age_rating']); ?></span>
                        </div>
                       
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center bg-white p-4 rounded-lg border border-neutral-200/30">
            <a href="<?php echo '?page=' . max(1, $page - 1) . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($genre_filter) ? '&genre=' . urlencode($genre_filter) : '') . (!empty($status_filter) ? '&status=' . urlencode($status_filter) : ''); ?>"
                class="px-4 py-2 text-neutral-600 hover:text-neutral-900 <?php echo $page <= 1 ? 'opacity-50 cursor-not-allowed' : ''; ?>">
                Previous
            </a>
            <div class="flex space-x-1">
                <?php
                // Calculate which page numbers to show
                $start_page = max(1, min($page - 2, $total_pages - 4));
                $end_page = min($total_pages, max($page + 2, 5));

                for ($i = $start_page; $i <= $end_page; $i++):
                ?>
                    <a href="<?php echo '?page=' . $i . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($genre_filter) ? '&genre=' . urlencode($genre_filter) : '') . (!empty($status_filter) ? '&status=' . urlencode($status_filter) : ''); ?>"
                        class="px-4 py-2 <?php echo $i == $page ? 'bg-blue-50 text-blue-600' : 'text-neutral-600 hover:bg-neutral-50'; ?> rounded">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($end_page < $total_pages): ?>
                    <span class="px-4 py-2">...</span>
                    <a href="<?php echo '?page=' . $total_pages . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($genre_filter) ? '&genre=' . urlencode($genre_filter) : '') . (!empty($status_filter) ? '&status=' . urlencode($status_filter) : ''); ?>"
                        class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">
                        <?php echo $total_pages; ?>
                    </a>
                <?php endif; ?>
            </div>
            <a href="<?php echo '?page=' . min($total_pages, $page + 1) . (!empty($search) ? '&search=' . urlencode($search) : '') . (!empty($genre_filter) ? '&genre=' . urlencode($genre_filter) : '') . (!empty($status_filter) ? '&status=' . urlencode($status_filter) : ''); ?>"
                class="px-4 py-2 text-neutral-600 hover:text-neutral-900 <?php echo $page >= $total_pages ? 'opacity-50 cursor-not-allowed' : ''; ?>">
                Next
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-96">
        <h3 class="text-lg font-semibold mb-4">Confirm Deletion</h3>
        <p class="mb-6">Are you sure you want to delete "<span id="deleteMovieTitle"></span>"? This action cannot be undone.</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeDeleteModal()" class="px-4 py-2 bg-neutral-100 text-neutral-700 rounded-lg hover:bg-neutral-200 transition-colors">Cancel</button>
            <form id="deleteForm" action="../../app/controller/deleteMovie.php" method="POST">
                <input type="hidden" id="deleteMovieId" name="movie_id">
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(movieId, movieTitle) {
        document.getElementById('deleteMovieId').value = movieId;
        document.getElementById('deleteMovieTitle').textContent = movieTitle;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close modal if clicking outside the modal content
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
</script>

<?php
$content = ob_get_clean();
include 'operator_layout.php';
?>