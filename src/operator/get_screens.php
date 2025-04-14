<?php
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
?>