<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Contact Form</h1>
    <form action="search_contact.php" method="post">
        <label for="contact">Mobile Phone Number:</label>
        <input type="tel" name="contact" id="contact" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="address">Address:</label>
        <input type="address" name="address" id="address" required><br>
        <label for="registration_number">Registration Number:</label>
        <input type="registration_number" name="registration_number" id="registration_number" required><br>
    </form>
        <form action="search_contact.php" method="post">
        <h2>Search Contact Details</h2>
        <label for="registration_number">Registration Number:</label>
        <input type="text" name="registration_number" id="registration_number"><br>
        <button type="submit">Search </button>
    </form>
    
</body>
</html>

