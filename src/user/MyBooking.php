<?php include_once("Nevigation.php");
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Database connection
require_once("../../config/connection.php");

// Get logged in user's email
$userEmail = $_SESSION['email'];

// Get user ID from email
$userQuery = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userId = $user['id'];

    // Get booking history with movie details
    $query = "SELECT b.booking_id, b.booking_date, b.booking_status, b.total_amount, 
                     m.title, m.poster_path, t.title as theater_name, 
                     DATE_FORMAT(s.showtime_date, '%M %d, %Y') as formatted_date,
                     TIME_FORMAT(s.showtime_time, '%h:%i %p') as formatted_time,
                     b.selected_seats
              FROM bookings b
              JOIN showtimes s ON b.showtime_id = s.id
              JOIN movies m ON s.movie_id = m.movie_id
              JOIN theaters t ON s.theater_id = t.id
              WHERE b.user_id = ?
              ORDER BY b.booking_date DESC";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $bookings = $stmt->get_result();
} else {
    // Handle case where user email doesn't exist
    $error = "User not found.";
}
?>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-red-600">My Booking History</h1>
            <a href="index.php" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Book New Movie
            </a>
        </div>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($bookings) && $bookings->num_rows > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($booking = $bookings->fetch_assoc()): ?>
                    <div class="border w-96 rounded-lg shadow-md bg-white overflow-hidden transition-transform hover:scale-[1.02] hover:shadow-lg">
                        <div class="relative">
                            <img src="<?php echo !empty($booking['poster_path']) ? '../../public/Images/' . $booking['poster_path'] : '../../public/Images/default-movie.jpg'; ?>"
                                alt="<?php echo $booking['title']; ?>"
                                class="h-96 w-full min-h-80 hover:scale-110 hover:transition hover:ease-in-out hover:delay-150 transition object-cover object-center aspect-[2/3]">

                            <!-- Status Badge -->
                            <?php
                            $statusColor = "";
                            switch ($booking['booking_status']) {
                                case 'confirmed':
                                    $statusColor = "bg-green-500";
                                    break;
                                case 'pending':
                                    $statusColor = "bg-yellow-500";
                                    break;
                                case 'cancelled':
                                    $statusColor = "bg-red-500";
                                    break;
                            }
                            ?>
                            <div class="absolute top-2 right-2 <?php echo $statusColor; ?> text-white px-3 py-1 rounded-full text-sm font-medium">
                                <?php echo ucfirst($booking['booking_status']); ?>
                            </div>
                        </div>

                        <div class="p-4">
                            <h2 class="text-xl font-bold text-gray-800 mb-2"><?php echo $booking['title']; ?></h2>

                            <div class="flex items-center space-x-1 text-gray-500 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <span><?php echo $booking['theater_name']; ?></span>
                            </div>

                            <div class="flex items-center space-x-1 text-gray-500 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span><?php echo $booking['formatted_date']; ?></span>
                            </div>

                            <div class="flex items-center space-x-1 text-gray-500 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><?php echo $booking['formatted_time']; ?></span>
                            </div>

                            <div class="flex items-center space-x-1 text-gray-500 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                </svg>
                                <span>Seats: <?php echo $booking['selected_seats']; ?></span>
                            </div>

                            <div class="mt-3 flex justify-between items-center">
                                <span class="text-lg font-bold text-red-600">₹<?php echo number_format($booking['total_amount'], 2); ?></span>

                                <span class="text-sm text-gray-500">
                                    Booked on: <?php echo date('M d, Y', strtotime($booking['booking_date'])); ?>
                                </span>
                            </div>

                            <?php if ($booking['booking_status'] != 'cancelled'): ?>
                                <div class="mt-4">
                                    <a href="download_invoice.php?booking_id=<?php echo $booking['booking_id']; ?>"
                                        class="block w-full bg-gray-800 hover:bg-gray-900 text-white text-center py-2 rounded transition">
                                        Download Ticket
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No Bookings Found</h3>
                <p class="text-gray-500 mb-6">You haven't booked any movies yet.</p>
                <a href="index.php" class="inline-block bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md transition">
                    Browse Movies
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>

<?php include_once("Footer.php"); ?>