<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_cashier_system_db";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>