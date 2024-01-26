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
    include('config.php');
    $barcode = $_GET['barcode'];

    $Book_Name = $_POST['Book_Name'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];
    $details = $_POST['details'];
    $category = $_POST['category'];
    $language = $_POST['language'];
    $page_count = $_POST['page_count'];
    $is_available = $_POST['is_available'];
    $price = $_POST['price'];

    mysqli_query($conn, "UPDATE books SET Book_Name = '$Book_Name',
                                          author = '$author',
                                          publication_year = '$publication_year',
                                          details = '$details',
                                          category = '$category',
                                          language = '$language',
                                          page_count = '$page_count',
                                          is_available = '$is_available',
                                          price = '$price'  
                    WHERE barcode = '$barcode'");
    echo "updated";
    header("Refresh: 5; ../Products_Page/Products.php");
    exit;
?>
