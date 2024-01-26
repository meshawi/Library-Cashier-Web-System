<?php
include "config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        echo "Login successful!";
        header("Location: ../index.php");
        exit;
    } else {
        echo "Invalid username or password";
        header("Location: ../Login_Page/login.php");
        exit;
    }
}

$conn->close();
?>
