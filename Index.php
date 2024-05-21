<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anosurv</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <style>
        /* New CSS rule to make the website not scrollable */
        body {
            overflow: hidden;
            margin: 0; /* Remove default body margin */
        }
    </style>
    <style>
        .wrapper {
            position: relative;
            z-index: 1; /* Set a higher z-index to keep the wrapper on top */
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
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="post" action="login.php">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" name="Login" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="Register.php">Register</a></p>
            </div>
        </form>
    </div>
    <div class="background-image"></div> <!-- This div holds the background image -->
    <h1 class="anosurv"><span class="yellow-letter">A</span>NOSURV</h1>
</body>
</html>
