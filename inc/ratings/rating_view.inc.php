<?php

declare(strict_types=1);
require_once "rating_model.inc.php";

if ($page === "product_details") {

    $productId = $_GET['product_id']; // Retrieve product_id from the URL
    $ratings = get_product_rating_by_id($pdo, $productId);
}

if ($page === "index") {
    /*  $ratings = get_all_product_rating($pdo); */
}
