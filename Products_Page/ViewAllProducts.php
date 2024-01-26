<?php
include "../include/config.php";
session_start();

if (!isset($_SESSION['username'])) {
   header("Location: ../Login_Page/login.php");
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="ViewAllProducts.css">

</head>

<body>

   <h2>All Product :</h2>

   <table>
      <tr>
         <th>Barcode</th>
         <th>Book Name</th>
         <th>Author</th>
         <th>Pubilcation Year</th>
         <th>Details</th>
         <th>Category</th>
         <th>Language</th>
         <th>page count</th>
         <th>Is available</th>
         <th>Price</th>
      </tr>




      <?php



      $sql = "SELECT barcode, Book_Name, author,  publication_year, details, category, language, page_count, is_available, price from books";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["barcode"]
               . "<tr><td>" . $row["Book_Name"]
               . "</td><td>" . $row["author"]
               . "</td><td>" . $row["publication_year"]
               . "</td><td>" . $row["details"]
               . "</td><td>" . $row["category"]
               . "</td><td>" . $row["language"]
               . "</td><td>" . $row["page_count"]
               . "</td><td>" . $row["is_available"]
               . "</td><td>" . $row["price"] . "</td></tr>";
         }
         echo "</table>";
      } else {
         echo "0 result";
      }

      $conn->close();

      ?>


   </table>
</body>

</html>