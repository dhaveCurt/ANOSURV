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

// Check if form data is provided via POST request
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $violation = $_POST['violation'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("UPDATE violation SET firstName=?, lastName=?, age=?, violation=? WHERE id=?");
    $stmt->bind_param("ssisi", $firstName, $lastName, $age, $violation, $id);

    // Execute statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data provided";
}
?>
