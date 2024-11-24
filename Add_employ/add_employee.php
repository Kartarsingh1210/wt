<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $joining_date = $_POST['joining_date'];

    $sql = "INSERT INTO employees (name, email, department, joining_date)
            VALUES ('$name', '$email', '$department', '$joining_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Department:</label>
        <input type="text" name="department" required><br><br>
        <label>Joining Date:</label>
        <input type="date" name="joining_date" required><br><br>
        <button type="submit">Add Employee</button>
    </form>
</body>
</html>

