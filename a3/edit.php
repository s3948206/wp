<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");


if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to edit a pet.</p>";
    exit();
}

if (isset($_GET['pet_id'])) {
    $pet_id = intval($_GET['pet_id']);
    $username = $_SESSION['username'];

    // Fetch the pet details for editing
    $stmt = $conn->prepare("SELECT * FROM pets WHERE petid = ? AND username = ?");
    $stmt->bind_param("is", $pet_id, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $pet = $result->fetch_assoc();

    if (!$pet) {
        echo "<p>Pet not found or you do not have permission to edit this pet.</p>";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update pet details
        $petname = $_POST['pet-name'];
        $description = $_POST['description'];
        $age = $_POST['age-months'];
        $location = $_POST['location'];
        $type = $_POST['pet-type'];

        $stmt = $conn->prepare("UPDATE pets SET petname = ?, description = ?, age = ?, location = ?, type = ? WHERE petid = ? AND username = ?");
        $stmt->bind_param("ssissis", $petname, $description, $age, $location, $type, $pet_id, $username);

        if ($stmt->execute()) {
            echo "<p>Pet updated successfully!</p>";
            header("Location: user.php");
            exit();
        } else {
            echo "<p>Error updating pet: " . $stmt->error . "</p>";
        }
    }
} else {
    echo "<p>Invalid pet ID.</p>";
}
?>

<main>
    <h2>Edit Pet</h2>
    <form method="post" action="edit.php?pet_id=<?php echo $pet_id; ?>">
        <label for="pet-name">Pet Name:</label>
        <input type="text" id="pet-name" name="pet-name" value="<?php echo htmlspecialchars($pet['petname']); ?>" required>

        <label for="pet-type">Type:</label>
        <select id="pet-type" name="pet-type" required>
            <option value="cat" <?php if ($pet['type'] == 'cat') echo 'selected'; ?>>Cat</option>
            <option value="dog" <?php if ($pet['type'] == 'dog') echo 'selected'; ?>>Dog</option>
        </select>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($pet['description']); ?></textarea>

        <label for="age-months">Age (months):</label>
        <input type="number" id="age-months" name="age-months" value="<?php echo htmlspecialchars($pet['age']); ?>" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($pet['location']); ?>" required>

        <button type="submit">Update Pet</button>
    </form>
</main>

<?php
include_once("includes/footer.inc");
?>