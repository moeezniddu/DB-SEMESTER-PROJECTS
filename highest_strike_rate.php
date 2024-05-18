<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pslhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT p.player_name, b.runs, b.strike_rate FROM battingstats_players b
        INNER JOIN players p ON b.player_id = p.player_id
        WHERE b.runs > 200
        ORDER BY b.strike_rate DESC
        LIMIT 10";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='score-table'>";
    echo "<tr><th>Player Name</th><th>Runs</th><th>Strike Rate</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["player_name"] . "</td>";
        echo "<td>" . $row["runs"] . "</td>";
        echo "<td>" . $row["strike_rate"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
