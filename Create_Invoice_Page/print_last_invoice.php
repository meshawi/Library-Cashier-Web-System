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
include "../include/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../Login_Page/login.php");
    exit;
}

$sql = "SELECT * FROM invoices ORDER BY invoice_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $invoiceDetails = $result->fetch_assoc();

    $invoiceId = $invoiceDetails['invoice_id'];
    $sqlItems = "SELECT * FROM invoice_items WHERE invoice_id = '$invoiceId'";
    $resultItems = $conn->query($sqlItems);
    $invoiceItems = array();

    while ($row = $resultItems->fetch_assoc()) {
        $invoiceItems[] = $row;
    }

    echo "<h2>Last Invoice Details</h2>";
    echo "<p>Invoice ID: {$invoiceDetails['invoice_id']}</p>";
    echo "<p>Customer Name: {$invoiceDetails['customer_name']}</p>";
    echo "<p>Phone Number: {$invoiceDetails['phone_number']}</p>";
    echo "<p>Total Price: {$invoiceDetails['total_price']}</p>";

    echo "<h3>Invoice Items</h3>";
    echo "<ul>";
    foreach ($invoiceItems as $item) {
        echo "<li>Barcode: {$item['book_id']} - Quantity: {$item['quantity']} - Price: {$item['price']}</li>";
    }
    echo "</ul>";
} else {
    echo "No invoices found.";
}
?>
