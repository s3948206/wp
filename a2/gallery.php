<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");
?>

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

    <!-- Static gallery items -->
    <div class="gallery">
        <div class="gallery-item">
            <a href="details.php?pet_id=1">
                <img src="./images/cat1.jpeg" alt="Milo">
            </a>
            <p>Milo</p>
        </div>
        <div class="gallery-item">
            <a href="details.php?pet_id=2">
                <img src="./images/dog1.jpeg" alt="Baxter">
            </a>
            <p>Baxter</p>
        </div>
        <div class="gallery-item">
            <a href="details.php?pet_id=3">
                <img src="./images/cat2.jpeg" alt="Luna">
            </a>
            <p>Luna</p>
        </div>
        <div class="gallery-item">
            <a href="details.php?pet_id=4">
                <img src="./images/dog2.jpeg" alt="Willow">
            </a>
            <p>Willow</p>
        </div>
        <div class="gallery-item">
            <a href="details.php?pet_id=5">
                <img src="./images/cat4.jpeg" alt="Oliver">
            </a>
            <p>Oliver</p>
        </div>
        <div class="gallery-item">
            <a href="details.php?pet_id=6">
                <img src="./images/dog3.jpeg" alt="Bella">
            </a>
            <p>Bella</p>
        </div>
    </div>

    <!-- Dynamic gallery items from database -->
    <div class="gallery">
        <?php
        // Fetch additional pets from the database
        $sql = "SELECT * FROM pets";
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

<?php
include_once("includes/footer.inc");
?>