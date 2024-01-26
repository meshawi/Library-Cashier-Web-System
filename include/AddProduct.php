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
include ('config.php');

$barcode = $_POST['barcode'];
$Book_Name = $_POST['Book_Name'];
$author = $_POST['author'];
$publication_year = $_POST['publication_year'];
$details = $_POST['details'];
$category = $_POST['category'];
$language = $_POST['language'];
$page_count = $_POST['page_count'];
$is_available = $_POST['is_available'];
$price = $_POST['price'];

mysqli_query($conn, "insert into books (barcode,
                                          Book_Name,
                                          author,
                                          publication_year,
                                          details,
                                          category,
                                          language,
                                          page_count,
                                          is_available,
                                          price) 
                        values ('$barcode', '$Book_Name', '$author', '$publication_year', '$details', '$category', '$language', '$page_count', '$is_available', '$price')");
echo "Product added";
?>