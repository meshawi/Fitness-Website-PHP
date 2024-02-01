<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
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
    <link rel="stylesheet" href="z.css">
    <style>
        .user-details-container {
    max-width: 600px; /* Adjust the width as needed */
    margin: 50px auto; /* This centers the container */
    padding: 20px;
    background-color: #f2f2f2; /* Light grey background, can be changed */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds a subtle shadow */
    text-align: center; /* Center the text inside the container */
}

.user-details-container h1 {
    color: #333; /* Dark text color */
    margin-bottom: 20px;
}

.user-details-container p {
    color: #666; /* Lighter text color */
    line-height: 1.6; /* Adjust line spacing */
}

    </style>
    <script src="script.js" defer></script>
</head>
<body>
   
        
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="index.php">Home</a></li>

            </ul>
            <a href="logout.php" class="login-btn">Logout</a>
        </nav>
    </header>

    <div class="user-details-container">
<?php
$username = $_SESSION['login_user'];

// Fetch user details from the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"]. "<br>";
        echo "Full Name: " . $row["fullname"]. "<br>";
        echo "Email: " . $row["email"]. "<br>";
        echo "Phone Number: " . $row["phone_number"]. "<br>";
        echo "BMI: " . (isset($row["bmi"]) ? $row["bmi"] : "Not calculated") . "<br>";
        echo "Calorie Needs: " . (isset($row["calorie_needs"]) ? $row["calorie_needs"] . " cal/day" : "Not calculated") . "<br>";

    }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
<script src="z.js"></script>
</body>
</html>
