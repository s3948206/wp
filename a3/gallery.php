<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");

// Initialize pet type variable
$selected_type = isset($_GET['pet_type']) ? $_GET['pet_type'] : '';
?>
<div class="container">
    <main>
        <div>
            <h2 class="g1">
                Pets Victoria has a lot to offer!
            </h2>

            <p>
                FOR ALMOST TWO DECADES, PETS VICTORIA HAS HELPED IN CREATING TRUE SOCIAL CHANGE
                BY BRINGING PET ADOPTION INTO THE MAINSTREAM. OUR WORK HAS HELPED MAKE A
                DIFFERENCE TO THE VICTORIAN RESCUE COMMUNITY AND THOUSANDS OF PETS IN NEED OF RESCUE
                AND REHABILITATION. BUT, UNTIL EVERY PET IS SAFE, RESPECTED, AND LOVED, WE ALL
                STILL HAVE BIG, HAIRY WORK TO DO.
            </p>
        </div>

        <!-- Pet Type Filter -->
        <form method="GET" action="">
            <label for="pet_type">Select Pet Type:</label>
            <select name="pet_type" id="pet_type" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="cat" <?php echo ($selected_type === 'cat') ? 'selected' : ''; ?>>Cats</option>
                <option value="dog" <?php echo ($selected_type === 'dog') ? 'selected' : ''; ?>>Dogs</option>
            </select>
        </form>

        <!-- Static gallery items -->
        <div class="gallery">
            <?php
            // Static pets array
            $static_pets = [
                ['id' => 1, 'image' => './images/cat1.jpeg', 'name' => 'Milo', 'type' => 'cat'],
                ['id' => 2, 'image' => './images/dog1.jpeg', 'name' => 'Baxter', 'type' => 'dog'],
                ['id' => 3, 'image' => './images/cat2.jpeg', 'name' => 'Luna', 'type' => 'cat'],
                ['id' => 4, 'image' => './images/dog2.jpeg', 'name' => 'Willow', 'type' => 'dog'],
                ['id' => 5, 'image' => './images/cat4.jpeg', 'name' => 'Oliver', 'type' => 'cat'],
                ['id' => 6, 'image' => './images/dog3.jpeg', 'name' => 'Bella', 'type' => 'dog'],
            ];

            // Display static pets based on selected type
            foreach ($static_pets as $pet) {
                if ($selected_type === '' || $pet['type'] === $selected_type) {
            ?>
                    <div class="gallery-item">
                        <a href="details.php?pet_id=<?php echo $pet['id']; ?>">
                            <img src="<?php echo $pet['image']; ?>" alt="<?php echo $pet['name']; ?>">
                        </a>
                        <p><?php echo $pet['name']; ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <!-- Dynamic gallery items from database -->
        <div class="gallery">
            <?php
            // Prepare SQL query based on selected pet type
            $sql = "SELECT * FROM pets";
            if (!empty($selected_type)) {
                $sql .= " WHERE type = '" . mysqli_real_escape_string($conn, $selected_type) . "'";
            }

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                // Skip static pets if necessary (static ones already exist with petid <= 6)
                if ($row['petid'] > 6) {
            ?>
                    <div class="gallery-item">
                        <a href="details.php?pet_id=<?php echo $row['petid']; ?>">
                            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['petname']; ?>">
                        </a>
                        <p><?php echo $row['petname']; ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>

    </main>
</div>
<?php
include_once("includes/footer.inc");
?>