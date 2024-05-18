<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Assuming your MySQL username is "root"
$password = ""; // Enter your MySQL password here
$dbname = "pslhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$player_name = $_POST['player_name'];
$nationality = $_POST['nationality'];
$dob = $_POST['dob'];
$team_id = $_POST['team_id'];
$role = $_POST['role'];

// Insert new player into the database
$sql = "INSERT INTO players (player_name, nationality, dob, team_id, role)
        VALUES ('$player_name', '$nationality', '$dob', '$team_id', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "New player inserted successfully";
} else {
    echo "Error inserting new player: " . $conn->error;
}

$conn->close();
?>
