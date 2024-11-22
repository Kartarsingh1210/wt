<?php
include 'db.php';

// Fetch all results
$sql = "SELECT s.name, s.roll_no, r.total_marks, r.percentage FROM students s JOIN results r ON s.id = r.student_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Results</title>
</head>
<body>
    <div class="container">
        <h1>Student Results</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll Number</th>
                    <th>Total Marks</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['roll_no']; ?></td>
                        <td><?php echo $row['total_marks']; ?></td>
                        <td><?php echo $row['percentage']; ?>%</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="button">Back to Home</a>
    </div>
</body>
</html>
