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

        // Handle static images for specific pets (IDs 1 to 6)
        if ($pet_id <= 6) {
            switch ($pet_id) {
                case 1:
                    $pet['image'] = './images/cat1.jpeg'; // Milo
                    break;
                case 2:
                    $pet['image'] = './images/dog1.jpeg'; // Baxter
                    break;
                case 3:
                    $pet['image'] = './images/cat2.jpeg'; // Luna
                    break;
                case 4:
                    $pet['image'] = './images/dog2.jpeg'; // Willow
                    break;
                case 5:
                    $pet['image'] = './images/cat4.jpeg'; // Oliver
                    break;
                case 6:
                    $pet['image'] = './images/dog3.jpeg'; // Bella
                    break;
            }
        }
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

            <!-- Add a new div to hold the pet info -->
            <div class="pet-info-row">
                <p>
                    <span class="material-symbols-outlined">alarm</span>
                    <?php echo htmlspecialchars($pet['age']); ?> months
                </p>

                <p>
                    <span class="material-symbols-outlined">pets</span>
                    <?php echo htmlspecialchars($pet['type']); ?>
                </p>

                <p>
                    <span class="material-symbols-outlined">place</span>
                    <?php echo htmlspecialchars($pet['location']); ?>
                </p>
            </div>
        </div>
    <?php } ?>
</main>

<?php
include_once("includes/footer.inc");
?>