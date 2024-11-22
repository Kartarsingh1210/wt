<?php
session_start();
include 'db.php';

$user_id = 1; // Assuming a fixed user ID for simplicity

// Check the number of active sessions for the user
$stmt = $conn->prepare("SELECT COUNT(*) AS session_count FROM user_sessions WHERE user_id = ? AND last_activity >= NOW() - INTERVAL 5 MINUTE");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['session_count'] >= 3) {
    die("Maximum session limit reached. Please log out from another session to continue.");
}

// Register a new session
$session_id = session_id();
$stmt = $conn->prepare("INSERT INTO user_sessions (user_id, session_id) VALUES (?, ?)");
$stmt->bind_param("is", $user_id, $session_id);

if ($stmt->execute()) {
    echo "Login successful. You are now logged in!";
} else {
    echo "Error: " . $stmt->error;
}
?>
