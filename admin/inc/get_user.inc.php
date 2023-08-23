<?php
// Include your database connection code
require_once 'admin.model.inc.php';
require_once '../../inc/dbh.inc.php';

if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']);



    // Use the get_all_users function to get user data
    $users = get_all_users($pdo);

    $foundUser = null;
    foreach ($users as $user) {
        if ($user['id'] === $userId) {
            $foundUser = $user;
            break;
        }
    }



    if ($foundUser) {
        echo json_encode($foundUser);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'User ID not provided']);
}