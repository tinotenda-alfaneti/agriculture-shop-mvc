<?php

include_once dirname(__DIR__)."../controllers/product_controller.php";

include_once("../settings/core.php");



function getInvoiceData($order_id) {

    $databaseResults = view_order_ctr($order_id);
   // Initialize an empty array to store invoice items
    $invoiceItems = array();

// Loop through the database results
foreach ($databaseResults as $result) {

    $item = array(
        "product-name" => $result['product_title'],
        "product-description" => $result['product_desc'],
        "quantity" => $result['qty'],
        "rate" => $result['amt'] / $result['qty'],
        "amount" => $result['amt'],
        "brand" => $result['brand_name'],
        "seller-name" => $result['brand_owner_name']
    );

    // Push the item to the invoice items array
    $invoiceItems[] = $item;
}

// Construct the invoice data array
$invoiceData = array(
    "invoice-number" => $databaseResults[0]['invoice_no'], 
    "company-name" => "Elevate Murimi", 
    "company-address" => "Elevate Murimi Warehouses, ".$databaseResults[0]['customer_city'].", ".$databaseResults[0]['customer_country'],
    "customer-name" => $databaseResults[0]['customer_name'], 
    "customer-address" => $databaseResults[0]['customer_name']. "'s House, ".$databaseResults[0]['customer_city'].", ".$databaseResults[0]['customer_country'],
    "customer-email" => $databaseResults[0]['customer_email'], 
    "customer-phone" => $databaseResults[0]['customer_contact'], 
    "invoice-date" => "2024-04-05", 
    "payment-due" => "Upon receipt", 
    "amount-due" => $databaseResults[0]['amt'], 
    "subtotal" => $databaseResults[0]['amt'],
    "tax" => "GHS0.00", 
    "total" => $databaseResults[0]['amt'],
    "items" => $invoiceItems
);

    return $invoiceData;
}
?>