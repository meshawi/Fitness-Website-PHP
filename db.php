<?php
$servername = "localhost";
$username = "root"; // your db username
$password = ""; // your db password
$dbname = "fitness_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
