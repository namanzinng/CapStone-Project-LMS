<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Book ID</th><th>Title</th><th>Author</th><th>Availability</th><th>Price</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Bookid']}</td>";
        echo "<td>{$row['Title']}</td>";
        echo "<td>{$row['Author']}</td>";
        echo "<td>{$row['Available']}</td>";
        echo "<td>{$row['Price']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>