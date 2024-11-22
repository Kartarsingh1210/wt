<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', $age)";
    if ($conn->query($sql)) {
        header('Location: index.php');
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
    <script>
        function validateForm() {
            const name = document.forms["studentForm"]["name"].value;
            const email = document.forms["studentForm"]["email"].value;
            const age = document.forms["studentForm"]["age"].value;

            if (name === "" || email === "" || age === "") {
                alert("All fields must be filled out");
                return false;
            }
            if (isNaN(age) || age <= 0) {
                alert("Age must be a positive number");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Add New Student</h1>
        <form name="studentForm" method="POST" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <button type="submit" class="submit-button">Add Student</button>
        </form>
        <a href="index.php" class="back-button">Back to Home</a>
    </div>
</body>
</html>
