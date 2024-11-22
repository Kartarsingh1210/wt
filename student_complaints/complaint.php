<?php
 session_start();

 include 'db.php';

 if(!isset($_SESSION['student_id'])){
    header('Location:login.php');
    exit();
 }
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_SESSION['student_id'];
    $complaint = $_POST['complaint'];

    $sql = "INSERT INTO complaints (student_id, complaint) VALUES ('$student_id', '$complaint')";
    if ($con->query($sql)) {
        echo "Complaint registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Registration</title>
</head>
<body>
    <h2>Register a Complaint</h2>
    <form method="POST">
        <textarea name="complaint" rows="5" cols="30" placeholder="Write your complaint here..." required></textarea><br><br>
        <button type="submit">Submit Complaint</button>
</body>
</html>