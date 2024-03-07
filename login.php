<?php
session_start();


$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "login";

// Connect to database
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form
$username = $_POST["username"];
$password = $_POST["password"];

// Prepare and execute login query
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if username exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Check password 
    if ($password == $row["password"]) {
        $_SESSION["user_id"] = $row["id"];
        header("Location: contact_form.php");
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
