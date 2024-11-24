<?php
$host = 'localhost';
$user = 'root'; // Replace with your DB username
$password = ''; // Replace with your DB password
$dbname = 'employee_management';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
