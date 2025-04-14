<?php
// cancel_showtime.php - Handles cancellation of showtimes
require_once("../../config/connection.php");

// Set content type to JSON
header('Content-Type: application/json');

// Check if showtime_id is provided
if (!isset($_POST["showtime_id"]) || empty($_POST["showtime_id"])) {
    echo json_encode([
        'success' => false,
        'message' => 'Showtime ID is required'
    ]);
    exit;
}

// Sanitize the input
$showtime_id = intval($_POST["showtime_id"]);

// Update the showtime status to 'cancelled'
$query = "UPDATE showtimes SET status = 'cancelled' WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $showtime_id);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Showtime has been cancelled successfully'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to cancel showtime: ' . $conn->error
    ]);
}

// Close the connection
$stmt->close();
$conn->close();
