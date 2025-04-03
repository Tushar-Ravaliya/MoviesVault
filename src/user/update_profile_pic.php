<?php
// Start session if not already started
session_start();
require_once("../../config/connection.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Set response header to JSON
header('Content-Type: application/json');

// Check if file was uploaded
if (!isset($_FILES['profile_pic']) || $_FILES['profile_pic']['error'] === UPLOAD_ERR_NO_FILE) {
    echo json_encode(['success' => false, 'message' => 'No file uploaded']);
    exit;
}

// Check for upload errors
if ($_FILES['profile_pic']['error'] !== UPLOAD_ERR_OK) {
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form',
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload'
    ];

    $message = isset($errorMessages[$_FILES['profile_pic']['error']])
        ? $errorMessages[$_FILES['profile_pic']['error']]
        : 'Unknown upload error';

    echo json_encode(['success' => false, 'message' => $message]);
    exit;
}

// Define allowed file types
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

// Get file info
$file_name = $_FILES['profile_pic']['name'];
$file_size = $_FILES['profile_pic']['size'];
$file_tmp = $_FILES['profile_pic']['tmp_name'];
$file_type = $_FILES['profile_pic']['type'];
$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

// Check file size (800KB max)
if ($file_size > 800000) {
    echo json_encode(['success' => false, 'message' => 'File size must be less than 800KB']);
    exit;
}

// Check file type
if (!in_array($file_type, $allowed_types)) {
    echo json_encode(['success' => false, 'message' => 'Only JPG, PNG & GIF files are allowed']);
    exit;
}

// Create upload directory if it doesn't exist
$upload_dir = '../../public/profile/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// Generate unique filename
$user_id = $_SESSION['user_id'];
$new_filename = $user_id . '_' . time() . '.' . $file_ext;
$upload_path = $upload_dir . $new_filename;

// Move uploaded file
if (move_uploaded_file($file_tmp, $upload_path)) {
    // Update user profile picture in database
    $stmt = $conn->prepare("UPDATE users SET pic = ? WHERE id = ?");
    $stmt->bind_param("si", $new_filename, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Profile picture updated successfully', 'filename' => $new_filename]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database update failed: ' . $conn->error]);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
}
