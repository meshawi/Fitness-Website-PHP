<?php
session_start();
include 'db.php';

if (!isset($_SESSION['login_user'])) {
    header("location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);
    $calorie_needs = $gender === 'male' ? (66 + (6.23 * $weight) + (12.7 * $height) - (6.8 * $age)) : (655 + (4.35 * $weight) + (4.7 * $height) - (4.7 * $age));
    $username = $_SESSION['login_user'];

    $stmt = $conn->prepare("UPDATE users SET calorie_needs = ? WHERE username = ?");
    $stmt->bind_param("is", $calorie_needs, $username);
    $stmt->execute();

    header("location: profile.php");
    exit();
}
?>