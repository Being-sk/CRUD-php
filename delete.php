<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //database connection
    include_once('database/config.php');

    $stmt = $conn->query("DELETE FROM `users` WHERE id = $id");

    if ($stmt) {
        header('location:index.php');
    } else
        echo "DELETION FAILED";

    $conn->close();
}
