<?php

$email = json_decode(file_get_contents('php://input'), true)['email'];// Decode the JSON data

require_once '../dbh.inc.php';
require_once 'login_model.inc.php';
require_once 'login_contr.inc.php';

$userinfo = get_user_row($pdo, $email);

if (is_user_wrong($userinfo['exists'])) {
    $response = ['message' => "E-mail can't be found"];
} else {
    $response = ['message' => 'Email found'];
}


header('Content-Type: application/json');
echo json_encode($response);