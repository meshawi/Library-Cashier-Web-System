<?php
include "../include/config.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../Login_Page/login.php");
    exit;
}

$searchType = isset($_POST['search_type']) ? $_POST['search_type'] : "";
$searchValue = isset($_POST['search_value']) ? $_POST['search_value'] : "";

$invoices = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchValue = mysqli_real_escape_string($conn, $searchValue);

    switch ($searchType) {
        case 'invoice_id':
            $sql = "SELECT * FROM invoices WHERE invoice_id = '$searchValue'";
            break;
        case 'customer_name':
            $sql = "SELECT * FROM invoices WHERE customer_name LIKE '%$searchValue%'";
            break;
        case 'phone_number':
            $sql = "SELECT * FROM invoices WHERE phone_number = '$searchValue'";
            break;
        case 'invoice_date':
            $sql = "SELECT * FROM invoices WHERE invoice_date = '$searchValue'";
            break;
        default:
            $sql = "SELECT * FROM invoices";
            break;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $invoices[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
    <link rel="stylesheet" href="view_invoice.css">
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
    require ("../sidebar2.php");
    ?>
    <div class="main-container">
        <h1>View Invoice</h1>

        <form action="" method="post">
            <label for="search_type">Search By:</label>
            <select id="search_type" name="search_type">
                <option value="invoice_id">Invoice ID</option>
                <option value="customer_name">Customer Name</option>
                <option value="phone_number">Phone Number</option>
                <option value="invoice_date">Invoice Date</option>
            </select>

            <label for="search_value">Search Value:</label>
            <input type="text" id="search_value" name="search_value" required>

            <button type="submit" name="search">Search</button>
        </form>

        <?php
        if (!empty($invoices)) {
            echo "<h2>Search Results</h2>";
            echo "<table border='1'>";
            echo "<tr>
            <th>Invoice ID</th>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Invoice Date</th>
            <th>Total Price</th>
            <th>Book Details</th>
            <th>Action</th>
        </tr>";

            foreach ($invoices as $invoice) {
                echo "<tr>
                <td>{$invoice['invoice_id']}</td>
                <td>{$invoice['customer_name']}</td>
                <td>{$invoice['phone_number']}</td>
                <td>{$invoice['invoice_date']}</td>
                <td>{$invoice['total_price']}</td>";

                $invoiceId = $invoice['invoice_id'];
                $sqlItems = "SELECT ii.book_id, ii.quantity, ii.price, b.Book_Name, b.author, b.details
                     FROM invoice_items ii
                     JOIN books b ON ii.book_id = b.barcode
                     WHERE ii.invoice_id = '$invoiceId'";
                $resultItems = $conn->query($sqlItems);

                if ($resultItems->num_rows > 0) {
                    $bookDetails = array();
                    while ($item = $resultItems->fetch_assoc()) {
                        $bookDetails[] = "{$item['details']} (Qty: {$item['quantity']}, Price: {$item['price']}, Book Name: {$item['Book_Name']}, Author: {$item['author']})";
                    }

                    echo "<td>" . implode("<br>", $bookDetails) . "</td>";
                } else {
                    echo "<td colspan='3'>No invoice items found</td>";
                }

                echo "<td><button onclick=\"printInvoice('{$invoice['invoice_id']}')\">Print</button></td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        ?>

        <script>
            function printInvoice(invoiceId) {
                window.open('print_invoice.php?invoice_id=' + invoiceId, '_blank');
            }
        </script>

</body>

</html>