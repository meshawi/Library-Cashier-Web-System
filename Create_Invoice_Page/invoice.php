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

$customerName = isset($_POST['customer_name']) ? $_POST['customer_name'] : "";
$phoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : "";
$bookId = isset($_POST['book_id']) ? $_POST['book_id'] : "";
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fetch'])) {
        if (!empty($bookId) && is_numeric($quantity) && $quantity > 0) {
            $sql = "SELECT * FROM books WHERE barcode = '$bookId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $bookDetails = $result->fetch_assoc();
                $cart[] = array(
                    'book_id' => $bookDetails['barcode'],
                    'title' => $bookDetails['Book_Name'],
                    'author' => $bookDetails['author'],
                    'price' => $bookDetails['price'],
                    'quantity' => $quantity
                );
            } else {
                echo "Book not found";
            }
        }
    }

    if (isset($_POST['remove_last_item']) && !empty($cart)) {
        array_pop($cart);
    }

    if (isset($_POST['save_invoice']) && !empty($_SESSION['cart'])) {
        $customerName = htmlspecialchars($customerName);
        $phoneNumber = htmlspecialchars($phoneNumber);

        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $sql = "INSERT INTO invoices (customer_name, phone_number, total_price) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $customerName, $phoneNumber, $totalPrice);
        if ($stmt->execute()) {
            $invoiceId = $stmt->insert_id;

            foreach ($_SESSION['cart'] as $item) {
                $bookId = $item['book_id'];
                $quantity = $item['quantity'];

                $sql = "INSERT INTO invoice_items (invoice_id, book_id, quantity, price) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iiid", $invoiceId, $bookId, $quantity, $item['price']);
                $stmt->execute();
                $stmt->close();
            }
            $_SESSION['last_invoice_id'] = $invoiceId;

            $cart = array();
            echo "Invoice saved successfully!";
            header("Refresh: 5; invoice.php");
            exit;
        }
    }
}

$_SESSION['cart'] = $cart;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Cashier System</title>
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

  button[type="submit"] {
    background-color: rgb(41, 66, 41);
    color: white;
    padding: 10px 15px;
    margin-top: 10px;
    cursor: pointer;
  }

  input {
    padding: 5px;
    margin: 5px 0;
  }
</style>

</head>
<body>
<?php
    require("../sidebar2.php");
?>
  <div class="main-container">
    <h1>Library Cashier System</h1>
    <form action="" method="post">
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required value="<?php echo $customerName; ?>">

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required value="<?php echo $phoneNumber; ?>">

        <label for="book_id">Book ID (Barcode):</label>
        <input type="text" id="book_id" name="book_id" required value="<?php echo $bookId; ?>">

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="1">

        <button type="submit" name="fetch">Fetch</button>
        <button type="submit" name="save_invoice">Save Invoice</button>
        <button type="submit" name="remove_last_item">Remove Last Item</button>
    </form>

    <?php
if (!empty($_SESSION['cart'])) {
    echo "<h2>Cart</h2>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        $title = isset($item['title']) ? $item['title'] : "";
        $author = isset($item['author']) ? $item['author'] : "";
        $price = isset($item['price']) ? $item['price'] : "";
        $quantity = isset($item['quantity']) ? $item['quantity'] : "";

        echo "<li>{$title} by {$author} - Price: {$price} - Quantity: {$quantity}</li>";
    }
    echo "</ul>";
}
    ?>

<form action="print_last_invoice.php" method="post" target="_blank">
    <input type="submit" name="print_last_invoice" value="Print Last Invoice">
</form>  
  </div>
</body>
</html>
