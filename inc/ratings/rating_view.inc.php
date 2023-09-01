<?php 

declare(strict_types=1);

require_once "rating_model.inc.php";
$productId = $_GET['product_id']; // Retrieve product_id from the URL
$ratings = get_product_user_rating($pdo, $productId);