<?php
$host = "localhost";
$user = "root";
$password = ""; // Update with your MySQL password if any
$dbname = "vit_result";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
