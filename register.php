<?php
include 'connect.php'; // Include your database connection script

if (isset($_POST['register'])) { // Changed 'Register' to 'register' to match the HTML form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkusername = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($checkusername);
    if ($result->num_rows > 0) {
        echo "<script>alert('Username Already Exists!');</script>";
    } else {
        $insertQuery = "INSERT INTO user (firstName, lastName, username, password) VALUES ('$firstName', '$lastName', '$username', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('.wrapper').classList.add('hidden');
                        setTimeout(function() {
                            document.querySelector('.wrapper').style.display = 'none';
                            document.querySelector('.thank-you').style.display = 'block';
                        }, 500); 
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 3500);
                    });
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anosurv</title>
    <link rel="stylesheet" href="Register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <style>
        /* New CSS rule to make the website not scrollable */
        body {
            overflow: hidden;
            margin: 0; /* Remove default body margin */
        }

        .wrapper {
            position: relative;
            z-index: 1; /* Set a higher z-index to keep the wrapper on top */
            transition: opacity 0.5s ease-in-out; /* Add transition for smooth disappearance */
        }

        .hidden {
            opacity: 0;
        }

        .thank-you {
            display: none; /* Initially hidden */
            font-family: 'system-ui', cursive; /* Use Jomhuria font */
            font-size: 4vmax; /* Font size */
            color: rgba(202, 190, 81, 1); /* Text color */
            text-align: center; /* Center align text */
            margin-top: 20px; /* Add some margin at the top */
            animation: fadeIn 1s ease-in-out; /* Fade-in animation */
            text-shadow: -1px -1px 0 #474747,  
                         1px -1px 0 #474747,
                        -1px  1px 0 #474747,
                         1px  1px 0 #474747;
        }

        .redirect-message {
            font-size: 40%; /* Smaller font size for the redirect message */
            margin-top: 10px; /* Add some margin at the top */
            color: white; /* Text color */
            text-align: center; /* Center align text */
            font-family: 'system-ui', cursive;
            
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px); /* Start slightly below */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* End at normal position */
            }
        }

        .anosurv {
            font-family: 'Jomhuria', sans-serif;
            color: #ffffff;
            font-size: 30vmax; /* Adjust the size as needed */
            position: absolute;
            bottom: -300px; /* Adjust the positioning from the bottom */
            left: 160px; /* Adjust the positioning from the left */
            z-index: 0; /* Set a lower z-index to place it behind the wrapper */
            letter-spacing: 30px;
            text-shadow: -10px -10px 0 #474747,  
                         10px -10px 0 #474747,
                        -10px  10px 0 #474747,
                         10px  10px 0 #474747;
                         
            transition: transform 0.5s ease-in-out; /* Add transition for smooth movement */
            opacity: 0.7;
        }

        .anosurv .yellow-letter {
            font-family: 'Jomhuria', sans-serif;
            color: rgba(202, 190, 81, 1);
            font-size: 50vmax;
            letter-spacing: 50px;
        }
        
        /* New CSS for the background image */
        .background-image {
            position: fixed;
            top: 0;
            left: 0; /* Change left position to 0 */
            width: 100vw; /* Adjust width to cover the entire viewport */
            height: 100vh; /* Adjust height to cover the entire viewport */
            background-image: url("Image/Build.png"); /* Replace 'your-background-image-url.jpg' with the actual image URL */
            background-size: cover;
            background-position: left;
            opacity: 0.1; /* Adjust the opacity as needed */
            z-index: -2; /* Set a lower z-index to place it behind other content */
        }
        
        /* CSS animation for shaking the background on hover */
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            50% { transform: translateX(10px); }
            75% { transform: translateX(-10px); }
            100% { transform: translateX(0); }
        }

        /* Apply shake animation when background is hovered */
        .background-image:hover {
            animation: shake 0.5s ease-in-out;
        }
        
        /* CSS animation for moving ANOSURV on hover */
        .anosurv:hover {
            transform: translateY(-20px); /* Move ANOSURV up by 20px on hover */
        }

        /* Additional styles for spacing */
        .input-box {
            margin-bottom: 15px; /* Adjust the spacing between input boxes */
        }

        .btn {
            margin-top: 20px; /* Add space above the submit button */
        }
    </style>
</head>
<body>
<div class="wrapper">
    <form id="registrationForm" method="POST" action="">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" name="firstName" placeholder="Firstname" required>
        </div>
        <div class="input-box">
            <input type="text" name="lastName" placeholder="Lastname" required>
        </div>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="register" class="btn">Submit</button>
    </form>
</div>
    <div class="background-image"></div> <!-- This div holds the background image -->
    <h1 class="anosurv"><span class="yellow-letter">A</span>NOSURV</h1>
    <div class="thank-you">
        Thank you for Registering!
        <div class="redirect-message">Redirecting you to Login page...</div>
    </div>
</body>
</html>
