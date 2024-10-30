<?php
    session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: tracker.html");
            die("Error: User not logged in.");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Exercise Data</title>
</head>
<body>
    
    <div class="banner">
        <h1>Fitness Hub</h1>
     </div>
     
     <nav>
         <ul>
             <li><a href="index.html">Home</a></li>
             <li><a href="welcome.php">Tracker</a></li>
             <li><a href="services.html">Services</a></li>
             <li><a href="login.html">Login</a></li>
         </ul>
     </nav>
    <h2>Enter Data for Your Exercise Focus</h2>
    <form action="insert_data.php" method="POST">
        <label for="option">Select Focus:</label>
        <select name="option" id="option" required>
            <option value="Strength">Strength</option>
            <option value="Cardio">Cardio</option>
            <option value="Functional">Functional</option>
        </select><br><br>

        <label for="type1">Exercise 1:</label>
        <input type="number" id="type1" name="type1" required><br><br>

        <label for="type2">Exercise 2:</label>
        <input type="number" id="type2" name="type2" required><br><br>

        <label for="type3">Exercise 3:</label>
        <input type="number" id="type3" name="type3" required><br><br>

        <label for="entry_date">Date:</label>
        <input type="date" id="entry_date" name="entry_date" required><br><br>

        <button type="submit">Submit Data</button>
    </form>
</body>
</html>
