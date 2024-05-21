<?php 
session_start();
include("connect.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anosurv | Home Page</title>
    <link rel="stylesheet" href="Homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        /* Inline CSS for demonstration purposes */
        .navigation a.logo {
            font-family: 'Jomhuria', sans-serif;
            font-size: 100px;
            text-shadow: -5px -5px 0 #474747,  
                         5px -5px 0 #474747,
                        -5px  5px 0 #474747,
                         5px  5px 0 #474747;
        }
        
        /* Apply Lato font to navigation links */
        .navigation a:not(.logo) {
            font-family: 'Lato', sans-serif;
            font-size: 16px; /* Adjust font size as needed */
        }

        /* Custom styles for the headings */
        h1.heading1, h1.heading2 {
            font-family: 'Oswald', sans-serif; /* Change font family */
            font-size: 90px; /* Change font size */
            transition: transform 12s ease; /* Add transition */
        }

        .highlight {
            color: rgb(216, 203, 89); /* Make the text yellow */
        }

        /* Add hover effect */
        h1.heading1:hover, h1.heading2:hover {
            transform: scale(1.02); /* Scale up by 5% */
        }
    </style>
    <style>
        /* Inline CSS for demonstration purposes */
        body {
            background-image: url("Image/here.jpg");
            background-size: cover; /* Ensure the image covers the entire background */
            background-repeat: no-repeat; /* Prevent repeating of the image */
            background-attachment: fixed; /* Make the background image fixed when scrolling */
            background-position: center; /* Center the background image */
            margin: 0; /* Remove default body margin */
        }

        /* Add space between logout and data */
        .navigation a:nth-last-child(2) {
            margin-right: 20px;
        }

        /* Fixed position for the first heading */
        .heading1 {
            position: fixed;
            top: 60%; /* Adjust this value to move vertically */
            left: 80%; /* Adjust this value to move horizontally */
            transform: translate(-50%, -50%);
            text-align: center;
            white-space: nowrap; /* Prevent text from wrapping */
            text-shadow: -3px -3px 0 #7a7a7a,  
                         3px -3px 0 #696969,
                        -3px  3px 0 #696969,
                         3px  3px 0 #7a7a7a;
        }

        /* Fixed position for the second heading */
        .heading2 {
            position: fixed;
            top: 70%; /* Adjust this value to move vertically */
            left: 70%; /* Adjust this value to move horizontally */
            transform: translate(-50%, -50%);
            text-align: center;
            white-space: nowrap; /* Prevent text from wrapping */
            text-shadow: -3px -3px 0 #7a7a7a,  
                         3px -3px 0 #696969,
                        -3px  3px 0 #696969,
                         3px  3px 0 #7a7a7a;
        }

        .container {
            width: 100%;
            overflow: hidden; /* Ensure the container handles overflow */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <a href="#" class="logo">ANOSURV</a>
            <a href="homepage.php">Home</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="Data.php">Data</a>
            <a href="Index.php">Logout</a>
        </div>
    </div>
    
    <h1 class="heading1"><span class="highlight">BUILD</span> Efficiently</h1>
    <h1 class="heading2"><span class="highlight">BUILD</span> with Safety</h1>
</body>
</html>
