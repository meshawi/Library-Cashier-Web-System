<?php
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
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: rgb(27, 26, 26);
        }

        .main-container {
            padding-left: 20%;
            padding-top: 15px;
        }

        input[type="button"] {
            background-color: rgb(41, 66, 41);
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
    require("../sidebar2.php");
?>
<div class="main-container">
    <input type="button" value="Finans" onclick="alertN()">
    <input type="button" value="Salary" onclick="alertN()">
    <input type="button" value="Emplyees" onclick="alertN()">
    <input type="button" value="HR" onclick="alertN()">
    <input type="button" value="Suppliers" onclick="alertN()">
</div>

<script>
    function alertN() {
        alert('contact HR or Manager');
    }
</script>
</body>
</html>
