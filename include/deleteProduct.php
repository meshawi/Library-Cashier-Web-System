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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['barcode'])) {
        $barcode = $_GET['barcode'];

        $sql = "DELETE FROM books WHERE barcode = '$barcode'";

        if ($conn->query($sql) === TRUE) {
            echo "Book with barcode $barcode deleted successfully.";
        } else {
            echo "Error deleting book: " . $conn->error;
        }
    } else {
        echo "Barcode not provided.";
    }
} else {
    echo "Invalid request method. Use GET.";
}

$conn->close();
?>
