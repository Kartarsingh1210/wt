<?php
 $server="localhost";
 $username="root";
 $password="";
 $dbname="student_complaints";

 $con=mysqli_connect($server,$username,$password,$dbname);

 if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>