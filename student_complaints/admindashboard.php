<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

$sql = "SELECT c.id, s.username, c.complaint, c.created_at 
        FROM complaints c 
        JOIN students s ON c.student_id = s.id 
        ORDER BY c.created_at DESC";
$result = $con->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Admin Dashboard : All Complaints</h2>
    <table border="1">
        <tr>
            <th>Complaint ID</th>
            <th>Student Username</th>
            <th>Complaint</th>
            <th>Timestamp</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['complaint']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>