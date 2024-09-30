<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");

// Check if 'pet_id' is present in the URL
if (isset($_GET['pet_id'])) {
    $pet_id = intval($_GET['pet_id']); // Sanitize input

    // Fetch pet details from the database
    $sql = "SELECT * FROM pets WHERE petid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pet_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the pet details
        $pet = $result->fetch_assoc();
    } else {
        echo "<p>No pet found with that ID.</p>";
    }

    $stmt->close();
} else {
    echo "<p>No pet selected. Please go back to the gallery.</p>";
}

$conn->close();
?>

<main>
    <?php if (isset($pet)) { ?>
        <div class="pet-details">
            <h2><?php echo htmlspecialchars($pet['petname']); ?></h2>
            <img src="<?php echo htmlspecialchars($pet['image']); ?>" alt="<?php echo htmlspecialchars($pet['petname']); ?>">
            <p><strong>Type:</strong> <?php echo htmlspecialchars($pet['type']); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($pet['age']); ?> months</p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($pet['location']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($pet['description']); ?></p>
            <p><strong>Image Caption:</strong> <?php echo htmlspecialchars($pet['caption']); ?></p>
        </div>
    <?php } ?>
</main>

<?php
include_once("includes/footer.inc");
?>