<?php
include_once("includes/db_connect.inc");
include_once("includes/header.inc");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username and password are provided
    if (empty($username) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        // Query the database to find the user
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Check if the password matches
            if ($row['password'] === $password) { // Replace this with hashed comparison if using hashed passwords
                $_SESSION['username'] = $username; // Set session variable
                header("Location: index.php"); // Redirect after successful login
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
        $stmt->close();
    }
}

$conn->close();
?>
<div class="container">
    <main>
        <h2>Login</h2>

        <?php if (!empty($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <form action="login.php" method="POST" id="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </main>
</div>
<?php include_once("includes/footer.inc"); ?>