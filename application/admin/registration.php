<?php
// Database connection details
$host = 'localhost';
$dbname = 'business';
$username = 'root';
$password = 'safaricom';

// Start session
session_start();

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            $success = "Registration successful!";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        $error = "Username and password are required.";
    } else {
        // Retrieve user from the database
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, set session variables
                $_SESSION['username'] = $username;
                $success = "Login successful!";
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    $success = "You have been logged out.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Login System</h2>
        <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (isset($success)) { ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if (!isset($_SESSION['username'])) { ?>
        <!-- Registration Form -->
        <h3>Register</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>

        <!-- Login Form -->
        <h3 class="mt-5">Login</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
        <?php } else { ?>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="?logout" class="btn btn-danger">Logout</a>
        <?php } ?>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>