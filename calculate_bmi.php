<?php
session_start();
include 'db.php';

if (!isset($_SESSION['login_user'])) {
    header("location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = floatval($_POST['height']) / 100; // Convert to meters
    $weight = floatval($_POST['weight']);
    $bmi = $weight / ($height * $height);
    $username = $_SESSION['login_user'];

    $stmt = $conn->prepare("UPDATE users SET bmi = ? WHERE username = ?");
    $stmt->bind_param("ds", $bmi, $username);
    $stmt->execute();
    
    header("location: profile.php");
    exit();
}
?>

