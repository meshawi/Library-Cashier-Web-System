<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  background-color: rgb(27, 26, 26);
  color: white;
}

table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  border: 1px solid white;
  padding: 6px;
  text-align: left;
}

th {
  background-color: rgb(41, 66, 41);
  color: white;
}

td {
  background-color: black;
}

h2 {
  color: white;
}

a {
  color: green;
}
</style>

</head>
<body>
    
</body>
</html>

<?php
	include('config.php');
	$barcode = $_GET['barcode'];
	$query = mysqli_query($conn, "select * from `books` where barcode='$barcode'");
	$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Edit:</h2>
    <form method="POST" action="update.php?barcode=<?php echo $barcode; ?>">
        <label>Book Name:</label><input type="text" value="<?php echo $row['Book_Name']; ?>" name="Book_Name"> <br>
        <label>Author:</label><input type="text" value="<?php echo $row['author']; ?>" name="author"> <br>
        <label>Publication Year:</label><input type="number" value="<?php echo $row['publication_year']; ?>" name="publication_year"> <br>
        <label>Details:</label><input type="text" value="<?php echo $row['details']; ?>" name="details"> <br>
        <label>Category:</label><input type="text" value="<?php echo $row['category']; ?>" name="category"> <br>
        <label>Language:</label><input type="text" value="<?php echo $row['language']; ?>" name="language"><br>
        <label>Page Count:</label><input type="number" value="<?php echo $row['page_count']; ?>" name="page_count"><br>
        <label>Is Available:</label><input type="text" value="<?php echo $row['is_available']; ?>" name="is_available"><br>
        <label>Price:</label><input type="number" value="<?php echo $row['price']; ?>" name="price"><br>
        <button type="submit">Enter</button>
        <a href="/Library_Cashier_System/Products_Page/Products.php">Back</a>
    </form>
</body>
</html>
