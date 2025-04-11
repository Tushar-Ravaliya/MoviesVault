<?php
require_once '../../config/connection.php';

// Get booking ID from URL parameter
$booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;

if ($booking_id <= 0) {
    die("Invalid booking ID");
}

// Fetch booking details with all related information
$sql = "SELECT 
            b.booking_id, 
            b.user_id, 
            b.showtime_id, 
            b.num_tickets, 
            b.selected_seats, 
            b.total_amount, 
            b.payment_method, 
            b.booking_status, 
            b.booking_date,
            u.name AS user_name, 
            u.email AS user_email,
            u.number AS user_phone,
            m.title AS movie_title, 
            m.duration, 
            m.age_rating,
            s.showtime_date, 
            s.showtime_time, 
            s.price AS ticket_price,
            sc.screen_name, 
            sc.screen_type,
            t.title AS theater_name, 
            t.area AS theater_area
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        JOIN showtimes s ON b.showtime_id = s.id
        JOIN movies m ON s.movie_id = m.movie_id
        JOIN screens sc ON s.screen_id = sc.id
        JOIN theaters t ON s.theater_id = t.id
        WHERE b.booking_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Booking not found");
}

$booking = $result->fetch_assoc();

// Format booking date
$booking_date = date("d M Y, h:i A", strtotime($booking['booking_date']));
$show_date = date("d M Y", strtotime($booking['showtime_date']));
$show_time = date("h:i A", strtotime($booking['showtime_time']));

// Format selected seats
$seats = explode(',', $booking['selected_seats']);
$seats_formatted = implode(', ', $seats);

// Generate Invoice Number
$invoice_number = "INV-" . date("Ymd") . "-" . $booking['booking_id'];

// Generate HTML content for invoice
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking Invoice #' . $invoice_number . '</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 30px;
        }
        .invoice-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .movie-details {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
        }
        .total-row td {
            font-weight: bold;
            font-size: 18px;
            border-top: 2px solid #ddd;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        .payment-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }
        .status-confirmed {
            background-color: #d4edda;
            color: #155724;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        .booking-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .booking-info-column {
            flex: 1;
        }
        .booking-info h3 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .booking-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="logo">MoviesVault</div>
            <div>
                <h1>BOOKING INVOICE</h1>
                <p>Invoice #: ' . $invoice_number . '</p>
                <p>Date: ' . $booking_date . '</p>
            </div>
        </div>
        
        <div class="booking-info">
            <div class="booking-info-column">
                <h3>Customer Information</h3>
                <p><strong>Name:</strong> ' . htmlspecialchars($booking['user_name']) . '</p>
                <p><strong>Email:</strong> ' . htmlspecialchars($booking['user_email']) . '</p>
                <p><strong>Phone:</strong> ' . htmlspecialchars($booking['user_phone']) . '</p>
            </div>
            <div class="booking-info-column">
                <h3>Booking Status</h3>
                <p><span class="payment-status status-' . strtolower($booking['booking_status']) . '">' .
    ucfirst($booking['booking_status']) . '</span></p>
                <p><strong>Payment Method:</strong> ' . ucfirst(str_replace('_', ' ', $booking['payment_method'])) . '</p>
                <p><strong>Booking ID:</strong> ' . $booking['booking_id'] . '</p>
            </div>
        </div>
        
        <div class="movie-details">
            <h3>Movie Details</h3>
            <p><strong>Movie:</strong> ' . htmlspecialchars($booking['movie_title']) . ' (' . $booking['age_rating'] . ')</p>
            <p><strong>Theater:</strong> ' . htmlspecialchars($booking['theater_name']) . ', ' . htmlspecialchars($booking['theater_area']) . '</p>
            <p><strong>Screen:</strong> ' . htmlspecialchars($booking['screen_name']) . ' (' . htmlspecialchars($booking['screen_type']) . ')</p>
            <p><strong>Show Date & Time:</strong> ' . $show_date . ' at ' . $show_time . '</p>
            <p><strong>Duration:</strong> ' . floor($booking['duration'] / 60) . ' hr ' . ($booking['duration'] % 60) . ' min</p>
            <p><strong>Seats:</strong> ' . $seats_formatted . '</p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . htmlspecialchars($booking['movie_title']) . ' - ' . htmlspecialchars($booking['screen_type']) . '</td>
                    <td>' . $booking['num_tickets'] . '</td>
                    <td>₹' . number_format($booking['ticket_price'], 2) . '</td>
                    <td>₹' . number_format($booking['ticket_price'] * $booking['num_tickets'], 2) . '</td>
                </tr>
                <tr>
                    <td>Convenience Fee</td>
                    <td>1</td>
                    <td>₹' . number_format($booking['total_amount'] - ($booking['ticket_price'] * $booking['num_tickets']), 2) . '</td>
                    <td>₹' . number_format($booking['total_amount'] - ($booking['ticket_price'] * $booking['num_tickets']), 2) . '</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3">Total Amount</td>
                    <td>₹' . number_format($booking['total_amount'], 2) . '</td>
                </tr>
            </tbody>
        </table>
        
        <div class="footer">
            <p>Thank you for your booking! Please arrive at least 15 minutes before showtime.</p>
            <p>For any assistance, please contact our customer support: support@MoviesVault.com</p>
        </div>
    </div>
</body>
</html>
';

// Set headers for downloading the file
header('Content-Type: text/html');
header('Content-Disposition: attachment; filename="Movie_Booking_Invoice_' . $booking['booking_id'] . '.html"');

// Output the HTML content
echo $html;
exit;
