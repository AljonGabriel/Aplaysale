<?php

declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/Aplaysale/inc/dbh.inc.php';
require_once "cart_model.inc.php";



$cart_by_user = view_cart_by_user($pdo, $user_id);
