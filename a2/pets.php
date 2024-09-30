<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");
?>

<main>

    <div class="pets">
        <h2 class="pets">
            Discover Pets Victoria
        </h2>
    </div>

    <p>
        PETS VICTORIA IS A DEDICATED ADOPTION ORGANIZATION BASED IN VICTORIA, AUSTRALIA, FOCUSED ON PROVIDING A SAFE
        AND LOVING ENVIRONMENT FOR PETS IN NEED. WITH A COMPASSIONATE APPROACH, PETS VICTORIA WORKS
        TIRELESSLY TO RESCUE, REHABILITATE, AND REHOME DOGS, CATS, AND OTHER ANIMALS. THEIR MISSION
        IS TO CONNECT THESE DESERVING PETS WITH CARING INDIVIDUALS AND FAMILIES, CREATING LIFELONG BONDS. THE
        ORGANIZATION
        OFFERS A RANGE OF SERVICES, INCLUDING ADOPTION COUSNELING, PET EDUCATION, AND COMMUNITY SUPPORT PROGRAMS,
        ALL AIMED AT PROMOTING RESPONSIBLE PET OWNERSHIP AND REDUCING THE NUMBER OF HOMELESS ANIMALS.
    </p>

    <img src="images/pets.jpeg" alt="Pets Image" class="pets-image">
    <table class="pet-table">

        <thead>
            <tr>
                <th>Pet</th>
                <th>Type</th>
                <th>Age</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch all pets from the database
            $sql = "SELECT petname, type, age, location FROM pets";
            $result = $conn->query($sql);

            // Check if the query returns any results
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['petname']) . "</td>";
                    echo "<td>" . htmlspecialchars(ucfirst($row['type'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['age']) . " MONTHS</td>";
                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                    echo "</tr>";
                }
            } else {
                // Output a message if no pets are found
                echo "<tr><td colspan='4'>No pets available.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

</main>

<?php
include_once("includes/footer.inc");
?>

</html>