<?php

require_once('../assets/tcpdf/tcpdf.php');
include_once("../functions/invoice_data.php");

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Invoice');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);


$order_id = $_GET['order_id'];
$invoiceData = getInvoiceData($order_id);

// Start capturing the HTML content
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
        }
        .company-details {
            text-align: center;
            margin-bottom: 20px;
        }
        .company-details h1 {
            margin-bottom: 5px;
        }
        .company-details p {
            margin: 0;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table th, .product-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .total-table {
            width: 100%;
            border-collapse: collapse;
        }
        .total-table td {
            padding: 8px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Company Details -->
        <div class="company-details">
            <h1><?= $invoiceData["company-name"] ?></h1>
            <p><?= $invoiceData["company-address"] ?></p>
        </div>
        
        <!-- Invoice Details -->
        <div class="section">
            <h2 class="section-title">Invoice Details</h2>
            <table>
                <tr>
                    <td>Invoice Number:</td>
                    <td><?= $invoiceData["invoice-number"] ?></td>
                </tr>
                <tr>
                    <td>Invoice Date:</td>
                    <td><?= $invoiceData["invoice-date"] ?></td>
                </tr>
            </table>
        </div>
        
        <!-- Customer Information -->
        <div class="section">
            <h2 class="section-title">Customer Information</h2>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?= $invoiceData["customer-name"] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $invoiceData["customer-email"] ?></td>
                </tr>
                <tr>
                    <td>Contact:</td>
                    <td><?= $invoiceData["customer-phone"] ?></td>
                </tr>
            </table>
        </div>
        
        <!-- Products -->
        <div class="section">
            <h2 class="section-title">Products</h2>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through invoice items -->
                    <?php foreach($invoiceData["items"] as $item): ?>
                        <tr>
                            <td><?= $item["product-name"] ?></td>
                            <td><i><?= $item["product-description"] ?></i></td>
                            <td><?= $item["quantity"] ?></td>
                            <td><?= $item["rate"] ?></td>
                            <td><?= $item["amount"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Totals -->
        <div class="section">
            <h2 class="section-title">Totals</h2>
            <table class="total-table">
                <tr>
                    <td>Subtotal:</td>
                    <td><?= $invoiceData["subtotal"] ?></td>
                </tr>
                <tr>
                    <td>Tax:</td>
                    <td><?= $invoiceData["tax"] ?></td>
                </tr>
                <tr>
                    <td>Total:</td>
                    <td><?= $invoiceData["total"] ?></td>
                </tr>
                <tr>
                    <td>Amount Due:</td>
                    <td><?= $invoiceData["amount-due"] ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>


<?php

$pdfContent = ob_get_clean();


$pdf->writeHTML($pdfContent, true, false, true, false, '');

$pdf->Output('invoice.pdf', 'D');
?>
