<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");


if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to view your pets.</p>";
    exit();
}

$username = $_SESSION['username'];

// Fetch pets uploaded by the logged-in user
$stmt = $conn->prepare("SELECT * FROM pets WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>
<div class="container">
    <main>
        <h2>Your Uploaded Pets</h2>

        <?php if ($result->num_rows > 0): ?>
            <div class="user-pets">
                <?php while ($pet = $result->fetch_assoc()): ?>
                    <div class="pet-details">
                        <h3><?php echo htmlspecialchars($pet['petname']); ?></h3>
                        <img src="<?php echo htmlspecialchars($pet['image']); ?>" alt="<?php echo htmlspecialchars($pet['petname']); ?>">

                        <div class="pet-info-row">
                            <p><strong>Type:</strong> <?php echo htmlspecialchars($pet['type']); ?></p>
                            <p><strong>Age:</strong> <?php echo htmlspecialchars($pet['age']); ?> months</p>
                            <p><strong>Location:</strong> <?php echo htmlspecialchars($pet['location']); ?></p>
                            <p><strong>Description:</strong> <?php echo htmlspecialchars($pet['description']); ?></p>
                        </div>

                        <!-- Edit and Delete options -->
                        <div class="pet-actions">
                            <a href="edit.php?pet_id=<?php echo $pet['petid']; ?>" class="btn-edit">Edit</a>
                            <a href="delete.php?pet_id=<?php echo $pet['petid']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this pet?');">Delete</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>You haven't uploaded any pets yet.</p>
        <?php endif; ?>

        <?php
        $stmt->close();
        $conn->close();
        ?>
    </main>
</div>
<?php include_once("includes/footer.inc"); ?>