<?php
include_once "./connection/Connect.php";

//delete data
$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
 
    header("location: ./users.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>