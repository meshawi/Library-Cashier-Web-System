<?php
include "include/config.php";
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: Login_Page/login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="" />
</head>

<body>
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

    button {
      background-color: rgb(41, 66, 41);
      color: white;
      border: none;
      padding: 10px 20px;
      margin: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: darkgreen;
    }

    header {
      color: white;
    }
  </style>

  <?php
  require ("sidebar.php");
  ?>

  <div class="main-container">
    <header>
      <h1>Home Page</h1>
    </header>

    <main>
      <button id="1">NEW INVOICE</button>
      <button id="2">VIEW INVOICE</button>
      <button id="3">PRODUCT</button>
      <button id="4">REPORTS</button>
    </main>
  </div>
  <script>
    document.getElementById("1").addEventListener("click", one);
    document.getElementById("2").addEventListener("click", two);
    document.getElementById("3").addEventListener("click", three);
    document.getElementById("4").addEventListener("click", four);

    function one() {
      window.location.href = "Create_Invoice_Page/invoice.php";
    }

    function two() {
      window.location.href = "View_Invoice_Page/view_invoice.php";
    }

    function three() {
      window.location.href = "Products_Page/Products.php";
    }

    function four() {
      window.location.href = "Reports_Page/report.php";
    }
  </script>
</body>

</html>