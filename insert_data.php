<?php
session_start(); // Start the session

// Database connection (replace with your DB credentials)
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testdb";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the username is set in the session
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    die("Error: User not logged in.");
}

$username = $_SESSION['username'];

// Get form data
$option = strtolower($_POST['option']);  // Use lowercase for table naming consistency
$type1 = $_POST['type1'];
$type2 = $_POST['type2'];
$type3 = $_POST['type3'];
$entry_date = $_POST['entry_date'];

// Construct table name
$table_name = $username . "_". $option;

// Insert data into the target table
$insert_sql = "INSERT INTO $table_name (type1, type2, type3, entry_date) 
               VALUES ($type1, $type2, $type3, '$entry_date')";

if ($conn->query($insert_sql) === TRUE) {
    header("Location: welcome.html");
    echo "Data inserted successfully into $table_name.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
