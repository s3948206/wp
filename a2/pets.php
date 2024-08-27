<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>About</title>
</head>

<body>

    <?php
    include_once("includes/header.inc");
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
                <tr>
                    <td>MILO</td>
                    <td>CAT</td>
                    <td>3 MONTHS</td>
                    <td>MELBOURNE CBD</td>
                </tr>
                <tr>
                    <td>BAXTER</td>
                    <td>DOG</td>
                    <td>5 MONTHS</td>
                    <td>CAFE WOOLAMAI</td>
                </tr>
                <tr>
                    <td>LUNA</td>
                    <td>CAT</td>
                    <td>1 MONTH</td>
                    <td>FERNTREE GULLY</td>
                </tr>
                <tr>
                    <td>WILLOW</td>
                    <td>DOG</td>
                    <td>48 MONTHS</td>
                    <td>MARYSVILLE</td>
                </tr>
                <tr>
                    <td>OLIVER</td>
                    <td>CAT</td>
                    <td>12 MONTH</td>
                    <td>GRAMPIANS</td>
                </tr>
                <tr>
                    <td>BELLA</td>
                    <td>DOG</td>
                    <td>10 MONTHS</td>
                    <td>CARLTON</td>
                </tr>
            </tbody>
        </table>

    </main>

    <?php
    include_once("includes/footer.inc");
    ?>

</body>

</html>