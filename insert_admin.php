<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Assuming your MySQL username is "root"
$password = ""; // Enter your MySQL password here
$dbname = "pslhub"; // Replace 'your_database_name' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert new admin into the database
$sql = "INSERT INTO admin (username, email, password)
        VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New admin inserted successfully";
} else {
    echo "Error inserting new admin: " . $conn->error;
}

$conn->close();
?>
