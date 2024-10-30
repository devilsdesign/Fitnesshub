<?php
session_start(); // Start the session to maintain it across pages

// Database connection (replace with your DB credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$options = $_POST['options'] ?? [];

if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

// Insert into the main user table
$sql = "INSERT INTO users (username, password, age, height, weight) 
        VALUES ('$username', '$password', $age, $height, $weight)";
if ($conn->query($sql) === TRUE) {
    // Store the username in the session
    $_SESSION['username'] = $username;

    // Create tables for each selected option
    foreach ($options as $option) {
        $table_name = $username . "_" . strtolower($option);
        $create_table_sql = "CREATE TABLE $table_name (
            id INT AUTO_INCREMENT PRIMARY KEY,
            type1 INT,
            type2 INT,
            type3 INT,
            entry_date DATE
        )";

        if ($conn->query($create_table_sql) === FALSE) {
            echo "Error creating table $table_name: " . $conn->error . "<br>";
        }
    }

    // Redirect to welcome page on successful registration
    header("Location: index.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
