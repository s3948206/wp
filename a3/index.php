<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");
?>

<main class="home-page">
    <div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            // Query to fetch the last 4 uploaded pet images
            $sql = "SELECT image, petname FROM pets ORDER BY petid DESC LIMIT 4";
            $result = $conn->query($sql);
            $firstItem = true;

            // Check if the query returns any results
            if ($result->num_rows > 0) {
                // Output each pet image as a carousel item
                while ($row = $result->fetch_assoc()) {
                    // Check if it is the first item to set it as active
                    $activeClass = $firstItem ? ' active' : '';
                    $firstItem = false;

                    echo "<div class='carousel-item$activeClass'>";
                    echo "<img src='" . htmlspecialchars($row['image']) . "' class='d-block' alt='" . htmlspecialchars($row['petname']) . "' style='width: 100%; height: 300px; object-fit: cover;'>";
                    echo "</div>";
                }
            } else {
                // Display a placeholder if no images are found
                echo "<div class='carousel-item active'>";
                echo "<img src='images/placeholder.jpg' class='d-block' alt='No Pets Available' style='width: 100%; height: 300px; object-fit: cover;'>";
                echo "</div>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div>
        <h1>Pets Victoria</h1>
        <h2>WELCOME TO PET<br>ADOPTION</h2>
    </div>

</main>

<?php
include_once("includes/footer.inc");
?>