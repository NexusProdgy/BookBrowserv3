<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create a connection to the MySQL database
$servername = "localhost";
$username = "jayescareno22";  // Username
$password = "password1";  // Empty password
$dbname = "BookCollection";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all books from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// If there are rows returned, output them as JSON
if ($result->num_rows > 0) {
    $books = [];
    while($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
    echo json_encode($books);  // Output as JSON
} else {
    echo json_encode([]);  // Return empty array if no books found
}

$conn->close();
?>


