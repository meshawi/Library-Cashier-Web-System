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
    color: white;
  }

  .main-container {
    padding-left: 20%;
    padding-top: 15px;
  }
</style>

</head>
<body>
    
</body>
</html>

<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Barcode = $_POST['barcode'];

    $sql = "SELECT * FROM books WHERE barcode = '$Barcode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo $row['barcode'] . "<br>";
        echo $row['Book_Name'] . "<br>";
        echo $row['author'] . "<br>";
        echo $row['publication_year'] . "<br>";
        echo $row['details'] . "<br>";
        echo $row['category'] . "<br>";
        echo $row['language'] . "<br>";
        echo $row['page_count'] . "<br>";
        echo $row['is_available'] . "<br>";
        echo $row['price'] . "<br>";

        exit;
    } else {
        echo 'No Result!';
        exit;
    }
}

$conn->close();
?>
