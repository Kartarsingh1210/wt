<?php
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];

    foreach ($_POST['attendance'] as $student_id => $status) {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $student_id, $date, $status);
        $stmt->execute();
    }

    echo "Attendance recorded successfully!";
}

// Fetch students for attendance form
$result = $conn->query("SELECT id, roll_no, name FROM students");
?>

<h3>Take Attendance</h3>
<form method="POST" action="">
    Date: <input type="date" name="date" required><br><br>
    <table border="1">
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Status</th>
        </tr>
        <?php while ($student = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $student['roll_no']; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td>
                    <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Present" required> Present
                    <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Absent" required> Absent
                </td>
            </tr>
        <?php } ?>
    </table>
    <button type="submit">Submit Attendance</button>
</form>
