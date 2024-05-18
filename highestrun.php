<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pslhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database to get the top 10 highest run scorers with their names
$sql = "SELECT p.player_name, b.runs 
        FROM battingstats_players AS b
        INNER JOIN players AS p ON b.player_id = p.player_id
        ORDER BY b.runs DESC
        LIMIT 10";

$result = $conn->query($sql);

// Display the results in a table with CSS styles
if ($result->num_rows > 0) {
    echo "<table class='score-table'>";
    echo "<tr><th>Player Name</th><th>Runs</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["player_name"] . "</td>";
        echo "<td>" . $row["runs"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No results found";
}

$conn->close();
?>