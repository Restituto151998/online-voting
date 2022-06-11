<?php
include_once "./connection/Connect.php";
session_start();
//delete data
$sql = "DELETE FROM candidates WHERE id='" . $_GET["id"] . "'";
mysqli_query($conn, "DELETE FROM votes WHERE candidate_id='" . $_GET["id"] . "'");
mysqli_query($conn, "DELETE FROM scores WHERE candidates_id='" . $_GET["id"] . "'");
if (mysqli_query($conn, $sql)) {
    $_SESSION['success_message'] = "Candidate Deleted Successfully";
    header("Location: candidates.php");
    exit();
}