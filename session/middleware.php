<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$session_id = session_id();

// Update the last activity timestamp for the current session
$stmt = $conn->prepare("UPDATE user_sessions SET last_activity = NOW() WHERE user_id = ? AND session_id = ?");
$stmt->bind_param("is", $user_id, $session_id);
$stmt->execute();

// Check if the session has expired
$stmt = $conn->prepare("SELECT * FROM user_sessions WHERE user_id = ? AND session_id = ? AND last_activity >= NOW() - INTERVAL 5 MINUTE");
$stmt->bind_param("is", $user_id, $session_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Session expired, log out the user
    session_destroy();
    header("Location: login.php?message=Session expired. Please log in again.");
    exit();
}
?>
