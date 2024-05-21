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
    $stmt = $conn->prepare("DELETE FROM violation WHERE id = ?");
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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD Front End</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(107, 107, 107, 0.3);
    }

    h1 {
        text-align: center;
        color: rgba(202, 190, 81, 1);
    }

    form {
        margin-top: 20px;
    }

    input[type="text"],
    input[type="number"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: rgba(202, 190, 81, 1);
        color: #fff;
        border: none;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: rgba(202, 190, 81, 1);
        color: #fff;
    }

    td:last-child {
        text-align: center;
    }

    .edit-btn, .delete-btn {
        padding: 5px 10px;
        margin-right: 5px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .edit-btn {
        background-color: #3498db;
        color: #fff;
    }

    .delete-btn {
        background-color: #e74c3c;
        color: #fff;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Violation of Safety Protocol Logs</h1>
    <form id="crud-form" method="post">
        <input type="text" name="firstName" id="firstName" placeholder="Enter First Name">
        <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name">
        <input type="number" name="age" id="age" placeholder="Enter Age">
        <input type="text" name="violation" id="violation" placeholder="Enter Violation">
        <input type="submit" name="submit" value="Submit Information">
    </form>
    <table id="item-list">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Violation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data from the database and display it in the table
            $result = $conn->query("SELECT * FROM violation");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['firstName'] . "</td>";
                    echo "<td>" . $row['lastName'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>" . $row['violation'] . "</td>";
                    echo "<td>
                            <button class='edit-btn' onclick='editItem(" . $row['id'] . ")'>Edit</button>
                            <button class='delete-btn' onclick='deleteItem(" . $row['id'] . ")'>Delete</button>
                          </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    // Function to handle form submission
    document.getElementById("crud-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // Your JavaScript code to handle form submission
    });

    // Function to handle editing an item
    function editItem(id) {
        // Your code for editing an item
        console.log("Editing item with ID: " + id);
    }

    // Function to handle deleting an item
    function deleteItem(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            // Send an AJAX request to delete.php with the id parameter
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete.php?id=" + id, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Reload the page to update the table
                    window.location.reload();
                } else {
                    console.log("Error deleting record: " + xhr.responseText);
                }
            };
            xhr.send();
        }
    }
</script>
</body>
</html>
