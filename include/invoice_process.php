</head>
<body>
    
</body>
</html>
<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $phone_number = $_POST['phone_number'];
    $book_barcode = $_POST['book_barcode'];

    $sql = "SELECT * FROM books WHERE barcode = '$book_barcode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        echo "Author: " . $book['author'];
        echo "Price: " . $book['price'];

        echo "<form action='add_to_cart.php' method='post'>";
        echo "<input type='hidden' name='book_barcode' value='$book_barcode'>";
        echo "<input type='submit' value='Add to Cart'>";
        echo "</form>";

        echo "<form action='invoice.php' method='get'>";
        echo "<input type='submit' value='Cancel'>";
        echo "</form>";
    } else {
        echo "Invalid book barcode";
    }
}

$conn->close();
?>
