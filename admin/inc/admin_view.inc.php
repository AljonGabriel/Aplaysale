<?php

declare(strict_types=1);

require_once 'admin_model.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Aplaysale/inc/dbh.inc.php';



$usersData = get_all_users($pdo);
$usersCount = get_users_count($pdo);
$productData = get_all_product_data($pdo);
$productsCount = get_products_count($pdo);
$userFeedback = get_user_feedback($pdo);
$new_products = get_new_product($pdo);
$page === "product_details" ? ($product_by_id = get_product_by_ID($pdo, $productId)) : ([]);
