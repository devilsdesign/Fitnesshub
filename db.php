<?php
$host = 'localhost'; // Database host
$db = 'testdb'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password (default for XAMPP is empty)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
