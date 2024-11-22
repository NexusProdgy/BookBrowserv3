<?php
$servername = "localhost";
$username = "jayescareno22";
$password = "password1";
$dbname = "books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
