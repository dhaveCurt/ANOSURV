<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use the actual password for your database user
$database = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided via GET request
if(isset($_GET['id'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("DELETE FROM violation WHERE id = $id");
    $stmt->bind_param("i", $id);

    // Set parameter
    $id = $_GET['id'];

    // Execute statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided";
}
?>
