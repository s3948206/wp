<?php
include_once("includes/db_connect.inc");


if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to delete a pet.</p>";
    exit();
}

if (isset($_GET['pet_id'])) {
    $pet_id = intval($_GET['pet_id']);
    $username = $_SESSION['username'];

    // Delete the pet only if it belongs to the logged-in user
    $stmt = $conn->prepare("DELETE FROM pets WHERE petid = ? AND username = ?");
    $stmt->bind_param("is", $pet_id, $username);

    if ($stmt->execute()) {
        echo "<p>Pet deleted successfully.</p>";
        header("Location: user.php");
        exit();
    } else {
        echo "<p>Error deleting pet: " . $stmt->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid pet ID.</p>";
}

$conn->close();
