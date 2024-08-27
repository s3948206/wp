<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Add More</title>
</head>

<body>
    <?php
    include_once("includes/header.inc");
    ?>

    <main>

        <div>
            <h2 class="add"> Add a pet</h2>
        </div>

        <p> You Can Add A New Pet Here</p>
        <form id="add-pet-form">
            <label for="pet-name">Pet Name:</label>
            <input type="text" id="pet-name" name="pet-name" placeholder="Provide a name for the pet" required>

            <label for="pet-type">TYPE:</label>
            <select id="pet-type" name="pet-type" required>
                <option value="" disabled selected>--Choose an option--</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
            </select>

            <label for="description">DESCRIPTION:</label>
            <textarea id="description" name="description" placeholder="Describe the pet briefly" required></textarea>

            <label for="pet-image">Select an image:</label>
            <input type="file" id="pet-image" name="pet-image" accept="image/*" required>
            <span class="image-info">Max Image size 500px</span>

            <label for="image-caption">Image Caption:</label>
            <input type="text" id="image-caption" name="image-caption" placeholder="Describe the image in one word"
                required>

            <label for="age-months">Age (months):</label>
            <input type="number" id="age-months" name="age-months" placeholder="Age of pet in months" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Location of the pet" required>

            <div class="form-buttons">
                <button type="submit" class="btn-submit">Submit</button>
                <button type="reset" class="btn-clear">Clear</button>
            </div>

        </form>



    </main>

    <?php
    include_once("includes/footer.inc");
    ?>

</body>

</html>