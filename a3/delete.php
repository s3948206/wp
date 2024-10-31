<?php
session_start(); // Ensure session is started to recognize logged-in status
include_once("includes/db_connect.inc");

if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to delete a pet.</p>";
    exit();
}

if (isset($_GET['pet_id'])) {
    $pet_id = intval($_GET['pet_id']);
    $username = $_SESSION['username'];

    // Fetch the image path of the pet to delete the file later
    $stmt = $conn->prepare("SELECT image FROM pets WHERE petid = ? AND username = ?");
    $stmt->bind_param("is", $pet_id, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
        $imagePath = $pet['image'];

        // Delete the pet from the database
        $stmt = $conn->prepare("DELETE FROM pets WHERE petid = ? AND username = ?");
        $stmt->bind_param("is", $pet_id, $username);

        if ($stmt->execute()) {
            // Check if image exists, then delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            echo "<p>Pet deleted successfully.</p>";
            header("Location: user.php");
            exit();
        } else {
            echo "<p>Error deleting pet: " . $stmt->error . "</p>";
        }
    } else {
        echo "<p>Pet not found or you do not have permission to delete this pet.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid pet ID.</p>";
}

$conn->close();
