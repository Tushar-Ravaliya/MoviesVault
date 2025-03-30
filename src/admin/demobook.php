<?php
$page_title = "Admin Dashboard";
ob_start();

// Database connection
require_once("../../config/connection.php");
// Initialize variables
$movies = [];
$theaters = [];
$showtimes = [];
$users = [];
$selected_movie = isset($_POST['movie_id']) ? $_POST['movie_id'] : '';
$selected_theater = isset($_POST['theater_id']) ? $_POST['theater_id'] : '';
$selected_date = isset($_POST['showtime_date']) ? $_POST['showtime_date'] : date('Y-m-d');
$selected_showtime = isset($_POST['showtime_id']) ? $_POST['showtime_id'] : '';
$selected_user = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$selected_seats = isset($_POST['selected_seats']) ? $_POST['selected_seats'] : [];
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$booking_status = isset($_POST['booking_status']) ? $_POST['booking_status'] : 'pending';
$error_message = '';
$success_message = '';

// Fetch all movies
$sql = "SELECT * FROM movies ORDER BY title";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

// Fetch all theaters
$sql = "SELECT * FROM theaters WHERE status = 'Active' ORDER BY title";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $theaters[] = $row;
    }
}

// Fetch all users
$sql = "SELECT * FROM users WHERE status = 'active' ORDER BY name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
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
if (!empty($selected_showtime)) {
    // Get screen information for the showtime
    $sql = "SELECT sc.rows, sc.cols, sc.layout_type 
            FROM showtimes s
            JOIN screens sc ON s.screen_id = sc.id
            WHERE s.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selected_showtime);
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
        $stmt->bind_param("i", $selected_showtime);
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
if (!empty($selected_showtime)) {
    $sql = "SELECT price FROM showtimes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selected_showtime);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ticket_price = $row['price'];
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_booking'])) {
    if (empty($selected_user) || empty($selected_showtime) || empty($selected_seats) || empty($payment_method)) {
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
            $stmt->bind_param("iississ", $selected_user, $selected_showtime, $num_tickets, $seats_string, $total_amount, $payment_method, $booking_status);
            $stmt->execute();

            $booking_id = $conn->insert_id;

            // Insert into booked_seats table
            $sql = "INSERT INTO booked_seats (booking_id, showtime_id, seat_number) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            foreach ($selected_seats as $seat) {
                $stmt->bind_param("iis", $booking_id, $selected_showtime, $seat);
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .seating-layout {
            margin-top: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            cursor: pointer;
            background-color: #f8f8f8;
        }

        .seat.selected {
            background-color: #1e90ff;
            color: white;
        }

        .seat.booked {
            background-color: #ff6b6b;
            color: white;
            cursor: not-allowed;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .booking-summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 4px;
            border: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Movie Booking Admin Page</h1>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" id="user_id" required>
                    <option value="">Select a user</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['id']; ?>" <?php echo ($selected_user == $user['id']) ? 'selected' : ''; ?>>
                            <?php echo $user['name'] . ' (' . $user['email'] . ')'; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="movie_id">Select Movie:</label>
                <select name="movie_id" id="movie_id" required onchange="this.form.submit()">
                    <option value="">Select a movie</option>
                    <?php foreach ($movies as $movie): ?>
                        <option value="<?php echo $movie['movie_id']; ?>" <?php echo ($selected_movie == $movie['movie_id']) ? 'selected' : ''; ?>>
                            <?php echo $movie['title'] . ' (' . $movie['duration'] . ' mins, ' . $movie['age_rating'] . ')'; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if (!empty($selected_movie)): ?>
                <div class="form-group">
                    <label for="theater_id">Select Theater:</label>
                    <select name="theater_id" id="theater_id" required onchange="this.form.submit()">
                        <option value="">Select a theater</option>
                        <?php foreach ($theaters as $theater): ?>
                            <option value="<?php echo $theater['id']; ?>" <?php echo ($selected_theater == $theater['id']) ? 'selected' : ''; ?>>
                                <?php echo $theater['title'] . ' (' . $theater['area'] . ')'; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <?php if (!empty($selected_movie) && !empty($selected_theater)): ?>
                <div class="form-group">
                    <label for="showtime_date">Select Date:</label>
                    <input type="date" name="showtime_date" id="showtime_date" value="<?php echo $selected_date; ?>" min="<?php echo date('Y-m-d'); ?>" required onchange="this.form.submit()">
                </div>
            <?php endif; ?>

            <?php if (!empty($showtimes)): ?>
                <div class="form-group">
                    <label for="showtime_id">Select Showtime:</label>
                    <select name="showtime_id" id="showtime_id" required onchange="this.form.submit()">
                        <option value="">Select a showtime</option>
                        <?php foreach ($showtimes as $showtime): ?>
                            <option value="<?php echo $showtime['id']; ?>" <?php echo ($selected_showtime == $showtime['id']) ? 'selected' : ''; ?>>
                                <?php echo date('h:i A', strtotime($showtime['showtime_time'])) . ' - ₹' . $showtime['price']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php elseif (!empty($selected_movie) && !empty($selected_theater) && !empty($selected_date)): ?>
                <div class="alert alert-danger">No showtimes available for the selected date</div>
            <?php endif; ?>

            <?php if (!empty($seating_layout)): ?>
                <div class="seating-layout">
                    <h3>Select Seats</h3>
                    <p>Price per ticket: ₹<?php echo $ticket_price; ?></p>

                    <div class="screen-container" style="text-align: center; margin-bottom: 20px;">
                        <div style="width: 80%; height: 30px; background-color: #ccc; margin: 0 auto; border-radius: 5px; text-align: center; line-height: 30px;">
                            SCREEN
                        </div>
                    </div>

                    <?php foreach ($seating_layout as $row): ?>
                        <div class="row">
                            <?php foreach ($row as $seat): ?>
                                <?php
                                $is_booked = in_array($seat, $booked_seats);
                                $is_selected = in_array($seat, $selected_seats);
                                $class = $is_booked ? 'seat booked' : ($is_selected ? 'seat selected' : 'seat');
                                ?>
                                <div class="<?php echo $class; ?>" data-seat="<?php echo $seat; ?>" onclick="toggleSeat(this, '<?php echo $seat; ?>', <?php echo $is_booked ? 'true' : 'false'; ?>)">
                                    <?php echo $seat; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                    <div id="selected-seats-container" style="margin-top: 20px;">
                        <div id="selected-seats-display">
                            Selected seats: <span id="selected-seats-text"><?php echo implode(', ', $selected_seats); ?></span>
                        </div>
                        <div id="total-amount-display" style="margin-top: 10px;">
                            Total amount: ₹<span id="total-amount"><?php echo $ticket_price * count($selected_seats); ?></span>
                        </div>
                    </div>

                    <!-- Hidden input to store selected seats -->
                    <div id="selected-seats-inputs">
                        <?php foreach ($selected_seats as $seat): ?>
                            <input type="hidden" name="selected_seats[]" value="<?php echo $seat; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="payment_method">Payment Method:</label>
                    <select name="payment_method" id="payment_method" required>
                        <option value="">Select payment method</option>
                        <option value="cash" <?php echo ($payment_method == 'cash') ? 'selected' : ''; ?>>Cash</option>
                        <option value="credit_card" <?php echo ($payment_method == 'credit_card') ? 'selected' : ''; ?>>Credit Card</option>
                        <option value="debit_card" <?php echo ($payment_method == 'debit_card') ? 'selected' : ''; ?>>Debit Card</option>
                        <option value="upi" <?php echo ($payment_method == 'upi') ? 'selected' : ''; ?>>UPI</option>
                        <option value="net_banking" <?php echo ($payment_method == 'net_banking') ? 'selected' : ''; ?>>Net Banking</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="booking_status">Booking Status:</label>
                    <select name="booking_status" id="booking_status" required>
                        <option value="pending" <?php echo ($booking_status == 'pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="confirmed" <?php echo ($booking_status == 'confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                    </select>
                </div>

                <div class="booking-summary">
                    <h3>Booking Summary</h3>
                    <?php if (!empty($selected_movie) && !empty($selected_showtime)): ?>
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
                        foreach ($showtimes as $showtime) {
                            if ($showtime['id'] == $selected_showtime) {
                                $showtime_info = date('h:i A', strtotime($showtime['showtime_time']));
                                break;
                            }
                        }

                        $user_name = '';
                        foreach ($users as $user) {
                            if ($user['id'] == $selected_user) {
                                $user_name = $user['name'];
                                break;
                            }
                        }
                        ?>

                        <p><strong>Movie:</strong> <?php echo $movie_title; ?></p>
                        <p><strong>Theater:</strong> <?php echo $theater_name; ?></p>
                        <p><strong>Date:</strong> <?php echo date('d F Y', strtotime($selected_date)); ?></p>
                        <p><strong>Time:</strong> <?php echo $showtime_info; ?></p>
                        <p><strong>User:</strong> <?php echo $user_name; ?></p>
                        <p><strong>Selected Seats:</strong> <span id="summary-seats"><?php echo implode(', ', $selected_seats); ?></span></p>
                        <p><strong>Total Amount:</strong> ₹<span id="summary-amount"><?php echo $ticket_price * count($selected_seats); ?></span></p>
                    <?php endif; ?>
                </div>

                <button type="submit" name="submit_booking" class="submit-btn">Complete Booking</button>
            <?php endif; ?>
        </form>
    </div>

    <script>
        function toggleSeat(element, seat, isBooked) {
            if (isBooked) return;

            const selectedSeatsContainer = document.getElementById('selected-seats-inputs');
            const selectedSeatsText = document.getElementById('selected-seats-text');
            const totalAmountElement = document.getElementById('total-amount');
            const summarySeatsElement = document.getElementById('summary-seats');
            const summaryAmountElement = document.getElementById('summary-amount');
            const ticketPrice = <?php echo $ticket_price; ?>;

            if (element.classList.contains('selected')) {
                // Deselect seat
                element.classList.remove('selected');

                // Remove hidden input
                const inputToRemove = document.querySelector(`input[value="${seat}"]`);
                if (inputToRemove) inputToRemove.remove();
            } else {
                // Select seat
                element.classList.add('selected');

                // Add hidden input
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_seats[]';
                input.value = seat;
                selectedSeatsContainer.appendChild(input);
            }

            // Update selected seats text
            const selectedSeats = Array.from(document.querySelectorAll('input[name="selected_seats[]"]')).map(input => input.value);
            selectedSeatsText.textContent = selectedSeats.join(', ');

            // Update total amount
            const totalAmount = selectedSeats.length * ticketPrice;
            totalAmountElement.textContent = totalAmount;

            // Update summary
            if (summarySeatsElement) summarySeatsElement.textContent = selectedSeats.join(', ');
            if (summaryAmountElement) summaryAmountElement.textContent = totalAmount;
        }
    </script>
    <?php
    $content = ob_get_clean();
    include 'admin_layout.php';
    ?>