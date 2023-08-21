<?php

$emailInput = json_decode(file_get_contents('php://input'), true)['email'];
$plainPassword = json_decode(file_get_contents('php://input'), true)['password'];

require_once '../dbh.inc.php';
require_once 'login_model.inc.php';
require_once 'login_contr.inc.php';

$userinfo = get_user_row($pdo, $emailInput);

if (!$userinfo['exists']) {
    // User doesn't exist
    $response = ['message' => "E-mail can't be found"];
} else {
    // User exists, verify password
    if (is_password_mismatch($plainPassword, $userinfo['user']['pwd'])) {
        $response = ['message' => 'Password does not match'];
    } 
}

header('Content-Type: application/json');
echo json_encode($response);