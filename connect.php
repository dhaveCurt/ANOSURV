<?php
$host = "localhost";
$user = "root";
$pass = ""; // Replace with your MySQL root password
$db = "anosurv";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Failed to connect DB: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}

// Close the connection
$conn->close();
?>
