<?php
$productID = json_decode(file_get_contents('php://input'), true)['productID'];

require_once "admin_model.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/Aplaysale/inc/dbh.inc.php';
/* 
$productID = 145; */

// Fetch the product stocks based on the product ID (You may need to adjust this part)
$product_stocks = get_stocks_count($pdo, $productID);

// Define the response array
$response = [
    'product_stocks' => $product_stocks, // Add the product stocks to the response
];

// Set the response header to indicate JSON content
header('Content-Type: application/json');

// Echo the JSON-encoded response
echo json_encode($response);
