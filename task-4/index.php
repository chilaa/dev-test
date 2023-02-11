<?php
session_start();

// Connect to the database
$dsn = "mysql:host=localhost;dbname=database_name";
$username = "database_username";
$password = "database_password";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Login logic
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists in the database
    $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set a session variable to indicate that the user is logged in
            $_SESSION['logged_in'] = true;
        }
    }
}

// Logout logic
if (isset($_GET['logout'])) {
    // Unset the session variable to indicate that the user is logged out
    unset($_SESSION['logged_in']);
}

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Show the logged in page
    echo 'Welcome! You are logged in.';
    echo '<a href="?logout">Logout</a>';
} else {
    // Show the login form
    echo '
    <form action="" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
      <br>
      <input type="submit" name="login" value="Login">
    </form>
  ';
}
