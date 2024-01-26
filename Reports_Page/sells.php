<?php
include '../include/config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../Login_Page/login.php");
    exit;
}

function getReportData($connection)
{
    $query = "SELECT users.Full_Name AS user,
                     books.book_name AS book,
                     invoice_items.quantity,
                     invoice_items.price,
                     invoices.total_price
              FROM invoice_items
              JOIN invoices ON invoice_items.invoice_id = invoices.invoice_id
              JOIN users ON invoices.customer_name = users.Full_Name
              JOIN books ON invoice_items.book_id = books.barcode";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    $reportData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $reportData[] = $row;
    }

    mysqli_free_result($result);

    return $reportData;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generateReport'])) {
    $reportData = getReportData($conn);

    echo '<h2>Transaction Summary Report</h2>';

    if (empty($reportData)) {
        echo '<p>No data available</p>';
    } else {
        echo '<table class="report-table">';
        echo '<thead><tr><th>User</th><th>Book</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr></thead>';
        echo '<tbody>';

        $totalProfit = 0;

        foreach ($reportData as $item) {
            echo "<tr><td>{$item['user']}</td><td>{$item['book']}</td><td>{$item['quantity']}</td><td>{$item['price']}</td><td>{$item['total_price']}</td></tr>";
            $totalProfit += $item['total_price'];
        }

        echo '</tbody>';
        echo '</table>';

        echo "<p>Total Profit: {$totalProfit}</p>";

        echo '<button onclick="printReport()">Print Report</button>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Finans.css">
    <title>Library Cashier System - Reports</title>
    <style>
        body {
            background-color: black;
            color: white;
        }

        button {
            background-color: rgb(41, 66, 41);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Transaction Summary Report</h1>
        <form method="post">
            <button type="submit" name="generateReport">Generate Report</button>
        </form>
    </div>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</body>

</html>