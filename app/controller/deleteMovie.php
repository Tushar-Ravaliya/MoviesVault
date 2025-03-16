<?php
require_once '../../config/connection.php';


if (isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];

    // Create the SQL DELETE query
    $sql = "DELETE FROM movies WHERE movie_id = $movie_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/moviesvault/src/admin/movieManagement.php");
    } else {
        echo "Error deleting movie: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
