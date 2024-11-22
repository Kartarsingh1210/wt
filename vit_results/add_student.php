<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $subject1_mse = $_POST['subject1_mse'];
    $subject1_ese = $_POST['subject1_ese'];
    $subject2_mse = $_POST['subject2_mse'];
    $subject2_ese = $_POST['subject2_ese'];
    $subject3_mse = $_POST['subject3_mse'];
    $subject3_ese = $_POST['subject3_ese'];
    $subject4_mse = $_POST['subject4_mse'];
    $subject4_ese = $_POST['subject4_ese'];

    // Calculate total and percentage
    $total = ($subject1_mse + $subject1_ese) + ($subject2_mse + $subject2_ese) +
             ($subject3_mse + $subject3_ese) + ($subject4_mse + $subject4_ese);
    $percentage = ($total / 400) * 100;

    // Insert into students table
    $sql_student = "INSERT INTO students (name, roll_no) VALUES ('$name', '$roll_no')";
    if ($conn->query($sql_student)) {
        $student_id = $conn->insert_id;

        // Insert into results table
        $sql_results = "INSERT INTO results (student_id, subject1_mse, subject1_ese, subject2_mse, subject2_ese, subject3_mse, subject3_ese, subject4_mse, subject4_ese, total_marks, percentage) 
                        VALUES ($student_id, $subject1_mse, $subject1_ese, $subject2_mse, $subject2_ese, $subject3_mse, $subject3_ese, $subject4_mse, $subject4_ese, $total, $percentage)";
        if ($conn->query($sql_results)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
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
    <link rel="stylesheet" href="style.css">
    <title>Add Student</title>
</head>
<body>
    <div class="container">
        <h1>Add Student and Marks</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="roll_no">Roll Number:</label>
            <input type="text" id="roll_no" name="roll_no" required>

            <h3>Subject Marks</h3>
            <label>Subject 1 MSE (30%):</label>
            <input type="number" name="subject1_mse" required>
            <label>Subject 1 ESE (70%):</label>
            <input type="number" name="subject1_ese" required>

            <label>Subject 2 MSE (30%):</label>
            <input type="number" name="subject2_mse" required>
            <label>Subject 2 ESE (70%):</label>
            <input type="number" name="subject2_ese" required>

            <label>Subject 3 MSE (30%):</label>
            <input type="number" name="subject3_mse" required>
            <label>Subject 3 ESE (70%):</label>
            <input type="number" name="subject3_ese" required>

            <label>Subject 4 MSE (30%):</label>
            <input type="number" name="subject4_mse" required>
            <label>Subject 4 ESE (70%):</label>
            <input type="number" name="subject4_ese" required>

            <button type="submit" class="button">Submit</button>
        </form>
        <a href="index.php" class="button">Back to Home</a>
    </div>
</body>
</html>
