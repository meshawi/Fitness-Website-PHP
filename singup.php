<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = ($_POST['password']); // Simple hash, consider stronger hashing

    $sql = "INSERT INTO users (username, fullname, email, phone_number, password)
    VALUES ('$username', '$fullname', '$email', '$phone_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("location: login.php");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="singup.css">
    <script src="login-singup.js" defer></script>
</head>
<body>
   
        

        
    <div class="form-container">
        <form id="signup-form" action="singup.php" method="post">
            <h2>Signup</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="phone_number" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Signup</button>
            <p class="message">Already registered? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>