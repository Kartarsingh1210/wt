<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO students (roll_no, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $roll_no, $name);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<h3>Student Registration</h3>
<form method="POST" action="">
    Roll No: <input type="text" name="roll_no" required><br>
    Name: <input type="text" name="name" required><br>
    <button type="submit">Register</button>
</form>
