<?php
header('Content-Type: application/json');

// Database credentials
$host = 'localhost';
$user = 'jayescareno22';
$password = 'password1';
$dbname = 'BookCollection';

// Establish connection
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    echo json_encode(["success" => false, "message" => "Invalid input"]);
    exit();
}

// Update record
$sql = "UPDATE Books SET title=?, author=?, publicationYear=?, genre=?, isRead=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssisii",
    $data['title'],
    $data['author'],
    $data['publicationYear'],
    $data['genre'],
    $data['isRead'],
    $data['index'] + 1 // Adjust for zero-based indexing
);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Book updated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
