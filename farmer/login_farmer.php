<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM farmers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $farmer = $result->fetch_assoc();
        if (password_verify($password, $farmer['password'])) {
            $_SESSION['farmer_id'] = $farmer['id'];
            header("Location: farmer_dashboard.php");
            exit();
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "No such user found.";
    }
}
?>

<h3>Farmer Login</h3>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
