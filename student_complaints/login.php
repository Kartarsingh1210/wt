<?php
   include 'db.php';

   if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result=$con->query($sql);

    if($result->num_rows>0){
        session_start();
        $_SESSION['student_id']=$result->fetch_assoc()['id'];
        header('Location: student_dashboard.php');
    }else{
        echo "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
    <h1>Login Page</h1>
    <form  method="post">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="Enter Username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Enter Password" required><br><br>
        <button type="submit">Login</button>
    </form>
    </div>

</body>
</html>