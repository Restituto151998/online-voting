<?php
include_once "./connection/Connect.php";
session_start();
//clear data

mysqli_query($conn, "ALTER TABLE users AUTO_INCREMENT = 1");
mysqli_query($conn, "ALTER TABLE votes AUTO_INCREMENT = 1");
mysqli_query($conn, "ALTER TABLE candidates AUTO_INCREMENT = 1");
mysqli_query($conn, "ALTER TABLE scores AUTO_INCREMENT = 1");
mysqli_query($conn, "TRUNCATE TABLE votes");
mysqli_query($conn, "TRUNCATE TABLE candidates");
mysqli_query($conn, "TRUNCATE TABLE scores");
$sql = "DELETE FROM users WHERE type <> 'ADMIN'";
if (mysqli_query($conn, $sql)) {
    $_SESSION['success_message'] = "Data Cleared Successfully";
    header("Location: voters.php");
    exit();
}