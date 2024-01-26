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
    <link rel="stylesheet" href="Products.css">
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
        <button onclick="viewAllProducts()">View All Products</button>
        <button onclick="selectProducts()">Select Products</button>

        <br><br>
    
        <?php
        if ($_SESSION['role'] === 'admin') {
        ?>
        <form action="../include/deleteProduct.php" method="get">
            <label for="barcode">Enter Barcode to Delete:</label>
            <input type="number" id="barcodeToDelete" name="barcode" required>
            <button type="submit">Delete Product</button>
        </form>

        <br><br>

        <form action="../include/EditProduct.php" method="get">
            <label for="barcode">Enter Barcode to edit:</label>
            <input type="number" id="barcodeToEdit" name="barcode" required>
            <button type="submit">Edit Product</button>
        </form>

        <br><br>
    
        <form action="../include/AddProduct.php" method="post">
            <label for="barcode">Enter Barcode to Add:</label>
            <input type="number" id="barcodeToAdd" name="barcode" required><br>
            <label for="Book_Name">Enter Book Name to Add:</label>
            <input type="text" id="Book_NameToAdd" name="Book_Name" required><br>
            <label for="author">Enter Author to Add:</label>
            <input type="text" id="authorToAdd" name="author" required><br>
            <label for="publication_year">Enter Publication Year to Add:</label>
            <input type="number" id="publicationYearToAdd" name="publication_year" required><br>
            <label for="details">Enter Details to Add:</label>
            <input type="text" id="detailsToAdd" name="details" required><br>
            <label for="category">Enter Category to Add:</label>
            <input type="text" id="categoryToAdd" name="category" required><br>
            <label for="language">Enter Language to Add:</label>
            <input type="text" id="languageToAdd" name="language" required><br>
            <label for="page_count">Enter Page Count to Add:</label>
            <input type="number" id="pageCountToAdd" name="page_count" required><br>
            <label for="is_available">Enter Availability to Add:</label>
            <input type="text" id="isAvailableToAdd" name="is_available" required><br>
            <label for="price">Enter Price to Add:</label>
            <input type="number" id="priceToAdd" name="price" required><br>
            <button type="submit">Add Product</button>
        </form>
        </div>
        <?php
        }
        ?>    
    <script>
        function viewAllProducts() {
            window.open("ViewAllProducts.php");
        }

        function selectProducts() {
            window.open("SelectProducts.php");
        }
    </script>
</body>
</html>
