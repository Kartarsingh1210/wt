<?php
include 'db.php';

$result = $conn->query("SELECT students.roll_no, students.name, attendance.date, attendance.status
                        FROM attendance
                        JOIN students ON attendance.student_id = students.id
                        ORDER BY attendance.date DESC");
?>

<h3>Attendance Records</h3>
<table border="1">
    <tr>
        <th>Date</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>Status</th>
    </tr>
    <?php while ($record = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $record['date']; ?></td>
            <td><?php echo $record['roll_no']; ?></td>
            <td><?php echo $record['name']; ?></td>
            <td><?php echo $record['status']; ?></td>
        </tr>
    <?php } ?>
</table>
