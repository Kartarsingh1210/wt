<?php
$host = "localhost";
$user = "root";
$password = ""; // Update if you have a MySQL password
$dbname = "student_management";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
