<?php
include_once("includes/db_connect.inc");
include_once("includes/header.inc");

// Initialize variables to store error messages or success
$error = "";
$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $reg_date = date('Y-m-d H:i:s'); // Get current timestamp

    // Validation: Check if username and password are not empty
    if (empty($username) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        // Directly use the password as is (not hashed)
        $plain_password = $password;

        // Prepare SQL insert statement
        $sql = "INSERT INTO users (username, password, reg_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $plain_password, $reg_date);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            $success = "Registration successful!";
        } else {
            $error = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>
<div class="container">
    <main>
        <h2>Register</h2>

        <!-- Display success or error messages -->
        <?php if (!empty($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } elseif (!empty($success)) { ?>
            <div class="success"><?php echo $success; ?></div>
        <?php } ?>

        <!-- Registration Form -->
        <form action="register.php" method="POST" id="register-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Register</button>
        </form>
    </main>
</div>
<?php
include_once("includes/footer.inc");
?>