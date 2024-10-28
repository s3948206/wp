<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");

$searchResults = []; // Initialize an empty array for results

// Check if there's a search query
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $query = "%" . trim($_GET['q']) . "%"; // Use wildcards for partial matching

    // Prepare the SQL statement to search for pets by name, description, or type
    $sql = "SELECT * FROM pets WHERE petname LIKE ? OR description LIKE ? OR type LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $query, $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch results if any found
    if ($result->num_rows > 0) {
        while ($pet = $result->fetch_assoc()) {
            // Handle static images for specific pet IDs (1 to 6)
            if ($pet['petid'] <= 6) {
                switch ($pet['petid']) {
                    case 1:
                        $pet['image'] = './images/cat1.jpeg';
                        break;
                    case 2:
                        $pet['image'] = './images/dog1.jpeg';
                        break;
                    case 3:
                        $pet['image'] = './images/cat2.jpeg';
                        break;
                    case 4:
                        $pet['image'] = './images/dog2.jpeg';
                        break;
                    case 5:
                        $pet['image'] = './images/cat4.jpeg';
                        break;
                    case 6:
                        $pet['image'] = './images/dog3.jpeg';
                        break;
                }
            }
            $searchResults[] = $pet; // Add pet details to results array
        }
    } else {
        echo "<p>No results found for your search.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Please enter a search term.</p>";
}

$conn->close();
?>

<main>
    <h2>Search Results</h2>

    <?php if (!empty($searchResults)) { ?>
        <div class="search-results">
            <?php foreach ($searchResults as $pet) { ?>
                <div class="pet-details">
                    <h3><?php echo htmlspecialchars($pet['petname']); ?></h3>
                    <a href="details.php?pet_id=<?php echo $pet['petid']; ?>">
                        <img src="<?php echo htmlspecialchars($pet['image']); ?>" alt="<?php echo htmlspecialchars($pet['petname']); ?>">
                    </a>

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

                    <div class="pet-description">
                        <p><?php echo htmlspecialchars($pet['description']); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</main>

<?php
include_once("includes/footer.inc");
?>