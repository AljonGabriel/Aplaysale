<?php

declare(strict_types = 1);

require_once 'admin.model.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Aplaysale/inc/dbh.inc.php';



$usersData = get_all_users($pdo);
$usersCount = get_users_count($pdo);
$productData = get_all_product_data($pdo);
$productsCount = get_products_count($pdo);
$userFeedback = get_user_feedback( $pdo);