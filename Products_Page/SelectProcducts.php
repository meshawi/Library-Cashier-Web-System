<?php
include "../include/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../Login_Page/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Barcode</title>
    <link rel="stylesheet" href="SelectProcducts.css">
    <style>    
    body {
      margin: 0;
      padding: 0;
    }
    .main-container {
      padding-left: 20%;
      padding-top: 15px;
    }
    </style>
</head>
<body>
<?php
    require("../sidebar2.php");
?>  
<div class="main-container">
    <form action="../include/SelectProcducts_Process.php" method="post" id="login-form">
        <label for="barcode">Barcode:</label>
        <input type="number" id="barcode" name="barcode" />
        <button type="submit">Enter</button>
    </form>
</div>
</body>
</html>
