<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid = true; // Assuming validation is successful initially
    $errorMessage = "no  data submitted";

    $registrationNumber = trim($_POST["registration_number"]); // Trim whitespaces

    
    if (!preg_match("/^[A-Za-z0-9-]+$/", $registrationNumber)) {
        $isValid = false;
        $errorMessage = "Invalid registration number format (alphanumeric characters and hyphens only).";
    }

    // If validation fails, display error message and exit
    if (!$isValid) {
        echo "<h2>Error</h2>";
        echo "<p>$errorMessage</p>";
        exit;
    }

    // Connect to database (replace with your actual connection details)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a secure SQL statement to prevent injection vulnerabilities
    $sql = "SELECT contact, email, address FROM users WHERE registration_no = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters (recommended for prepared statements)
   $stmt->bind_param("s", $registrationNumber);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result (if any)
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $contactDetails = [
            "mobile" => $row["contact"],
            "email" => $row["email"],
            "address" => $row["address"],
            "registration_number" => $registrationNumber
        ];

        // Display search results with proper escaping for security
        echo "<h2>Contact Details</h2>";
        echo "<p>Mobile: " . htmlspecialchars($contactDetails['mobile']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($contactDetails['email']) . "</p>";
        echo "<p>Address: " . htmlspecialchars($contactDetails['address']) . "</p>";
    } else {
        echo "<h2>No contact details found for the provided registration number.</h2>";
    }

    $conn->close();
    $stmt->close();

} else {
    // If someone tries to access this page directly without submitting the form, redirect to contact form page
    header("Location: contact_form.php");
    exit;
}
?>
