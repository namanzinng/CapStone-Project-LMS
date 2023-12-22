<body>
<center>
<?php
// $servername = "localhost";
// $username = "username";
// $password = "";
// $dbname = "librarymamagementsystem";

// Create connection
$conn = mysqli_connect("localhost", "root", "","library");

// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the bookId parameter is set in the URL
if (isset($_GET['bookId'])) {
    $bookId = $_GET['bookId'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT Bookid, TITLE, AUTHOR FROM books WHERE Bookid = ?");
    $stmt->bind_param("s", $bookId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["Bookid"] . " - TITLE: " . $row["TITLE"] . " - AUTHOR: " . $row["AUTHOR"] . "<br>";
        }
    } else {
        echo "0 results for Book ID: " . $bookId;
    }

    $stmt->close();
} else {
    echo "Please provide a Book ID.";
}

$conn->close();
?>

<br>
<label><h3><a href="index.html">HOME</a></h3></label>
</center>
</body>