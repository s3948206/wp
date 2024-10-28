<?php
include_once("includes/header.inc");
include_once("includes/db_connect.inc");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $petname = $_POST['pet-name'];
    $pettype = $_POST['pet-type'];
    $description = $_POST['description'];
    $caption = $_POST['image-caption'];
    $age = $_POST['age-months'];
    $location = $_POST['location'];

    // Handle file upload
    $target_dir = "images/";

    // Generate a unique name for the file by appending a timestamp
    $unique_id = time(); // You can also use uniqid() or random_bytes()
    $target_file = $target_dir . $unique_id . '_' . basename($_FILES["pet-image"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["pet-image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 500KB)
    if ($_FILES["pet-image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["pet-image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["pet-image"]["name"]) . " has been uploaded.";

            // Prepare and bind SQL statement to insert the pet data into the database
            $stmt = $conn->prepare("INSERT INTO pets (petname, description, image, caption, age, location, type) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssiss", $petname, $description, $target_file, $caption, $age, $location, $pettype);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New pet added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();

            // Redirect to the gallery page after successful submission
            header("Location: gallery.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>


<main>
    <div>
        <h2 class="add"> Add a pet</h2>
    </div>
    <p> You Can Add A New Pet Here</p>
    <form id="add-pet-form" action="add.php" method="post" enctype="multipart/form-data">
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
        <input type="text" id="image-caption" name="image-caption" placeholder="Describe the image in one word" required>

        <label for="age-months">Age (months):</label>
        <input type="number" id="age-months" name="age-months" placeholder="Age of pet in months" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" placeholder="Location of the pet" required>

        <div class="form-buttons">
            <button type="submit" class="btn-submit">
                <span class="material-symbols-outlined">add_task</span> Submit
            </button>
            <button type="reset" class="btn-clear">
                <span class="material-symbols-outlined">close</span> Clear
            </button>
        </div>
    </form>
</main>

<?php
include_once("includes/footer.inc");
?>