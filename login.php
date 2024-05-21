<?php
include 'connect.php'; // Include your database connection script

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header("Location: homepage.php"); // Redirect to homepage after successful login
        exit();
    } else {
        // Display error message using JavaScript
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    alert('Incorrect Username or Password');
                    window.location.href = 'index.php'; // Redirect to index.php after clicking OK
                });
            </script>";
    }
}
?>
