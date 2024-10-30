<?php
session_start(); // Start the session
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and the password is correct
    if ($password ==$user['password']) { // Use password_verify for secure password checking
        // Start session and store user data
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $_SESSION['username'] = $user['username']; // Store username in session

        // Redirect to the homepage after successful login
        header("Location: index.html");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Invalid username or password!";
    }
}
?>
