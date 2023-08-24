<?php

declare(strict_types = 1);

require_once 'admin.model.inc.php';
require_once '../inc/dbh.inc.php';


$usersData = get_all_users($pdo);
$usersCount = get_users_count($pdo);