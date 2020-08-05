<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "crud-normal";

//connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//check connection
if ($conn->connect_errno) {
    die("connection Failed" . $conn->connect_error);
}
