<?php
include("Nevigation.php");

// Database connection
require_once("../../config/connection.php");
// Initialize variables
$movies = [];
$theaters = [];
$showtimes = [];
$users = [];

$selected_theater = isset($_POST['theater_id']) ? $_POST['theater_id'] : '';
$selected_date = isset($_POST['showtime_date']) ? $_POST['showtime_date'] : date('Y-m-d');
$showtimeId = isset($_GET['showtime_id']) ? $_GET['showtime_id'] : '';
$selected_seats = isset($_POST['selected_seats']) ? $_POST['selected_seats'] : [];
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$booking_status = isset($_POST['booking_status']) ? $_POST['booking_status'] : 'pending';
$error_message = '';
$success_message = '';
$selected_movie = '';
$selected_time = '';

// Get user ID from session
$user_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$selected_user = '';

// Get user ID from email
if (!empty($user_email)) {
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user_row = $result->fetch_assoc();
        $selected_user = $user_row['id'];
    }
}

// Fetch showtime details if showtimeId is provided
if (!empty($showtimeId)) {
    $sql = "SELECT * FROM showtimes WHERE id = ? AND status = 'active'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $showtimeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $showtime_row = $result->fetch_assoc();
        $selected_movie = $showtime_row['movie_id'];
        $selected_theater = $showtime_row['theater_id'];
        $selected_date = $showtime_row['showtime_date'];
        $selected_time = $showtime_row['showtime_time'];
    }
}

// Fetch the selected movie
if (!empty($selected_movie)) {
    $sql = "SELECT * FROM movies WHERE movie_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selected_movie);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
    }
}

// Fetch all theaters
$sql = "SELECT * FROM theaters WHERE id = ? AND status = 'Active'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $selected_theater);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $theaters[] = $row;
    }
}

// If movie and theater are selected, fetch showtimes
if (!empty($selected_movie) && !empty($selected_theater) && !empty($selected_date)) {
    $sql = "SELECT s.*, m.title as movie_title 
            FROM showtimes s
            JOIN movies m ON s.movie_id = m.movie_id
            WHERE s.movie_id = ? AND s.theater_id = ? AND s.showtime_date = ? AND s.status = 'active'
            ORDER BY s.showtime_time";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $selected_movie, $selected_theater, $selected_date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $showtimes[] = $row;
        }
    }
}

// If showtime is selected, get seat information
$seating_layout = [];
$booked_seats = [];
if (!empty($showtimeId)) {
    // Get screen information for the showtime
    $sql = "SELECT sc.rows, sc.cols, sc.layout_type 
            FROM showtimes s
            JOIN screens sc ON s.screen_id = sc.id
            WHERE s.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $showtimeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $screen_info = $result->fetch_assoc();
        $rows = $screen_info['rows'];
        $cols = $screen_info['cols'];

        // Create seating layout
        $row_labels = range('A', chr(ord('A') + $rows - 1));
        for ($i = 0; $i < $rows; $i++) {
            $row = [];
            for ($j = 1; $j <= $cols; $j++) {
                $row[] = $row_labels[$i] . $j;
            }
            $seating_layout[] = $row;
        }

        // Get booked seats for this showtime
        $sql = "SELECT seat_number FROM booked_seats WHERE showtime_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $showtimeId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $booked_seats[] = $row['seat_number'];
            }
        }
    }
}

// Get ticket price
$ticket_price = 0;
if (!empty($showtimeId)) {
    $sql = "SELECT price FROM showtimes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $showtimeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ticket_price = $row['price'];
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_booking'])) {
    if (empty($selected_user) || empty($showtimeId) || empty($selected_seats) || empty($payment_method)) {
        $error_message = "Please fill in all required fields";
    } else {
        // Start transaction
        $conn->begin_transaction();

        try {
            // Convert selected_seats array to comma-separated string
            $seats_string = implode(',', $selected_seats);
            $num_tickets = count($selected_seats);
            $total_amount = $num_tickets * $ticket_price;

            // Insert into bookings table
            $sql = "INSERT INTO bookings (user_id, showtime_id, num_tickets, selected_seats, total_amount, payment_method, booking_status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iississ", $selected_user, $showtimeId, $num_tickets, $seats_string, $total_amount, $payment_method, $booking_status);
            $stmt->execute();

            $booking_id = $conn->insert_id;

            // Insert into booked_seats table
            $sql = "INSERT INTO booked_seats (booking_id, showtime_id, seat_number) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            foreach ($selected_seats as $seat) {
                $stmt->bind_param("iis", $booking_id, $showtimeId, $seat);
                $stmt->execute();
            }

            // Commit transaction
            $conn->commit();

            $success_message = "Booking successfully created! Booking ID: " . $booking_id;

            // Reset selection
            $selected_seats = [];
        } catch (Exception $e) {
            // Rollback on error
            $conn->rollback();
            $error_message = "Error creating booking: " . $e->getMessage();
        }
    }
}
?>
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto py-8 px-4 max-w-4xl">
        <h1 class="text-3xl font-bold text-red-700 mb-8 text-center">Movie Booking Admin Panel</h1>

        <?php if (!empty($error_message)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?showtime_id=<?php echo $showtimeId; ?>" class="bg-white shadow-md rounded-lg p-6">

            <?php if (!empty($seating_layout)): ?>
                <div class="mt-8 bg-gray-100 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Select Seats</h3>
                    <p class="mb-4 text-red-600 font-medium">Price per ticket: ₹<?php echo $ticket_price; ?></p>

                    <div class="mb-8 text-center">
                        <div class="w-4/5 h-8 bg-gray-300 mx-auto rounded text-center leading-8 text-gray-700 font-medium mb-2">
                            SCREEN
                        </div>
                        <p class="text-xs text-gray-500">Front</p>
                    </div>

                    <div class="flex flex-col items-center space-y-2 mb-6">
                        <?php foreach ($seating_layout as $row): ?>
                            <div class="flex space-x-2">
                                <?php foreach ($row as $seat): ?>
                                    <?php
                                    $is_booked = in_array($seat, $booked_seats);
                                    $is_selected = in_array($seat, $selected_seats);
                                    $seat_classes = "w-10 h-10 flex items-center justify-center rounded-md text-xs font-medium cursor-pointer transition-colors duration-200";

                                    if ($is_booked) {
                                        $seat_classes .= " bg-gray-300 text-gray-500 cursor-not-allowed";
                                    } elseif ($is_selected) {
                                        $seat_classes .= " bg-red-600 text-white";
                                    } else {
                                        $seat_classes .= " bg-white border border-red-300 text-red-700 hover:bg-red-100";
                                    }
                                    ?>
                                    <div class="<?php echo $seat_classes; ?>" data-seat="<?php echo $seat; ?>" onclick="toggleSeat(this, '<?php echo $seat; ?>', <?php echo $is_booked ? 'true' : 'false'; ?>)">
                                        <?php echo $seat; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="flex justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-white border border-red-300 rounded mr-2"></div>
                            <span class="text-sm text-gray-600">Available</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-600 rounded mr-2"></div>
                            <span class="text-sm text-gray-600">Selected</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-gray-300 rounded mr-2"></div>
                            <span class="text-sm text-gray-600">Booked</span>
                        </div>
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg mt-4">
                        <div class="font-medium">
                            Selected seats: <span id="selected-seats-text" class="text-red-700"><?php echo implode(', ', $selected_seats); ?></span>
                        </div>
                        <div class="font-medium mt-2 text-lg">
                            Total amount: <span id="total-amount" class="text-red-700 font-bold">₹<?php echo $ticket_price * count($selected_seats); ?></span>
                        </div>
                    </div>

                    <!-- Hidden input to store selected seats -->
                    <div id="selected-seats-inputs">
                        <?php foreach ($selected_seats as $seat): ?>
                            <input type="hidden" name="selected_seats[]" value="<?php echo $seat; ?>" data-seat-id="<?php echo $seat; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="mb-4">
                        <label for="payment_method" class="block text-gray-700 font-medium mb-2">Payment Method</label>
                        <select name="payment_method" id="payment_method" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-red-500 focus:border-red-500 p-2.5">
                            <option value="">Select payment method</option>
                            <option value="cash" <?php echo ($payment_method == 'cash') ? 'selected' : ''; ?>>Cash</option>
                            <option value="credit_card" <?php echo ($payment_method == 'credit_card') ? 'selected' : ''; ?>>Credit Card</option>
                            <option value="debit_card" <?php echo ($payment_method == 'debit_card') ? 'selected' : ''; ?>>Debit Card</option>
                            <option value="upi" <?php echo ($payment_method == 'upi') ? 'selected' : ''; ?>>UPI</option>
                            <option value="net_banking" <?php echo ($payment_method == 'net_banking') ? 'selected' : ''; ?>>Net Banking</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="booking_status" class="block text-gray-700 font-medium mb-2">Booking Status</label>
                        <select name="booking_status" id="booking_status" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-red-500 focus:border-red-500 p-2.5">
                            <option value="pending" <?php echo ($booking_status == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?php echo ($booking_status == 'confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 bg-white p-6 rounded-lg border border-gray-200 shadow">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Booking Summary</h3>
                    <?php if (!empty($selected_movie) && !empty($showtimeId)): ?>
                        <?php
                        $movie_title = '';
                        foreach ($movies as $movie) {
                            if ($movie['movie_id'] == $selected_movie) {
                                $movie_title = $movie['title'];
                                break;
                            }
                        }

                        $theater_name = '';
                        foreach ($theaters as $theater) {
                            if ($theater['id'] == $selected_theater) {
                                $theater_name = $theater['title'];
                                break;
                            }
                        }

                        $showtime_info = '';
                        if (!empty($selected_time)) {
                            $showtime_info = date('h:i A', strtotime($selected_time));
                        }

                        $user_name = '';
                        if (!empty($selected_user)) {
                            $sql = "SELECT name FROM users WHERE id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $selected_user);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                $user_row = $result->fetch_assoc();
                                $user_name = $user_row['name'];
                            }
                        }
                        ?>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="mb-2"><span class="font-medium text-gray-700">Movie:</span> <span class="text-gray-900"><?php echo $movie_title; ?></span></p>
                                <p class="mb-2"><span class="font-medium text-gray-700">Theater:</span> <span class="text-gray-900"><?php echo $theater_name; ?></span></p>
                                <p class="mb-2"><span class="font-medium text-gray-700">Date:</span> <span class="text-gray-900"><?php echo date('d F Y', strtotime($selected_date)); ?></span></p>
                            </div>
                            <div>
                                <p class="mb-2"><span class="font-medium text-gray-700">Time:</span> <span class="text-gray-900"><?php echo $showtime_info; ?></span></p>
                                <p class="mb-2"><span class="font-medium text-gray-700">User:</span> <span class="text-gray-900"><?php echo $user_name; ?></span></p>
                                <p class="mb-2"><span class="font-medium text-gray-700">Selected Seats:</span> <span id="summary-seats" class="text-gray-900"><?php echo implode(', ', $selected_seats); ?></span></p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-xl font-bold text-red-700">Total Amount: ₹<span id="summary-amount"><?php echo $ticket_price * count($selected_seats); ?></span></p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-8 text-center">
                    <button type="submit" name="submit_booking" class="bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Complete Booking
                    </button>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
<script>
    function toggleSeat(element, seatId, isBooked) {
        if (isBooked) return; // Don't allow selecting booked seats

        const isSelected = element.classList.contains('bg-red-600');

        if (isSelected) {
            // Deselect the seat
            element.classList.remove('bg-red-600', 'text-white');
            element.classList.add('bg-white', 'border', 'border-red-300', 'text-red-700', 'hover:bg-red-100');

            // Remove from selected seats array
            removeSeatInput(seatId);
        } else {
            // Select the seat
            element.classList.remove('bg-white', 'border', 'border-red-300', 'text-red-700', 'hover:bg-red-100');
            element.classList.add('bg-red-600', 'text-white');

            // Add to selected seats array
            addSeatInput(seatId);
        }

        // Update the display
        updateSelectedSeatsDisplay();
    }

    function addSeatInput(seatId) {
        const container = document.getElementById('selected-seats-inputs');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'selected_seats[]';
        input.value = seatId;
        input.setAttribute('data-seat-id', seatId);
        container.appendChild(input);
    }

    function removeSeatInput(seatId) {
        const container = document.getElementById('selected-seats-inputs');
        const input = container.querySelector(`input[data-seat-id="${seatId}"]`);
        if (input) {
            container.removeChild(input);
        }
    }

    function updateSelectedSeatsDisplay() {
        const container = document.getElementById('selected-seats-inputs');
        const inputs = container.querySelectorAll('input');
        const selectedSeats = Array.from(inputs).map(input => input.value);

        document.getElementById('selected-seats-text').textContent = selectedSeats.join(', ');
        document.getElementById('summary-seats').textContent = selectedSeats.join(', ');

        const ticketPrice = <?php echo isset($ticket_price) ? $ticket_price : 0; ?>;
        const totalAmount = ticketPrice * selectedSeats.length;

        document.getElementById('total-amount').textContent = '₹' + totalAmount;
        document.getElementById('summary-amount').textContent = totalAmount;
    }
</script>
<?php
include("footer.php");
?>