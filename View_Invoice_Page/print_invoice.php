<?php
require('../TCPDF-main/tcpdf.php');

$invoiceId = $_GET['invoice_id'];

include "../include/config.php";

$sql = "SELECT * FROM invoices WHERE invoice_id = '$invoiceId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $invoice = $result->fetch_assoc();

    $sqlItems = "SELECT ii.book_id, ii.quantity, ii.price, b.details, b.author, b.Book_Name
                 FROM invoice_items ii
                 JOIN books b ON ii.book_id = b.barcode
                 WHERE ii.invoice_id = '$invoiceId'";
    $resultItems = $conn->query($sqlItems);

    $pdf = new TCPDF();
    $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
    $pdf->AddPage();

    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Invoice Bill', 0, 1, 'C');

    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, '', 0, 1, 'C');

    $pdf->Cell(30, 10, 'Invoice ID: ' . $invoice['invoice_id'], 0, 1);
    $pdf->Cell(50, 10, 'Customer Name: ' . $invoice['customer_name'], 0, 1);
    $pdf->Cell(40, 10, 'Phone Number: ' . $invoice['phone_number'], 0, 1);
    $pdf->Cell(60, 10, 'Invoice Date: ' . $invoice['invoice_date'], 0, 1);
    $pdf->Cell(30, 10, 'Total Price: $' . number_format($invoice['total_price'], 2), 0, 1);

    $pdf->Cell(0, 10, '', 0, 1);

    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(60, 10, 'Book Details', 1, 0);
    $pdf->Cell(30, 10, 'Book Name', 1, 0);
    $pdf->Cell(30, 10, 'Author', 1, 0);
    $pdf->Cell(30, 10, 'Quantity', 1, 0);
    $pdf->Cell(30, 10, 'Price', 1, 1);

    while ($item = $resultItems->fetch_assoc()) {
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(60, 10, $item['details'], 1, 0);
        $pdf->Cell(30, 10, $item['Book_Name'], 1, 0);
        $pdf->Cell(30, 10, $item['author'], 1, 0);
        $pdf->Cell(30, 10, $item['quantity'], 1, 0);
        $pdf->Cell(30, 10, '$' . number_format($item['price'], 2), 1, 1);
    }

    $pdfContent = $pdf->Output('invoice.pdf', 'S');

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="invoice.pdf"');
    header('Content-Length: ' . strlen($pdfContent));

    echo $pdfContent;
} else {
    echo "Invoice not found.";
}

$conn->close();
?>
