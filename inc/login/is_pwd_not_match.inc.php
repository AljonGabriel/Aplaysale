<?php

$password = json_decode(file_get_contents('php://input'), true)['password']; // Get the plain password from JSON data
$email = json_decode(file_get_contents('php://input'), true)['email']; // Get the email from JSON data

require_once '../dbh.inc.php';
require_once 'login_model.inc.php';
require_once 'login_contr.inc.php';

// Fetch the user's information, including the hashed password, based on the provided email
$userinfo = get_user_row($pdo, $email);

if (!$userinfo) {
    $response = ['message' => "E-mail can't be found"];
} else {
    // Compare the provided plain password with the user's hashed password
    if (is_password_mismatch($password, $userinfo['hashed_password'])) {
        $response = ['message' => 'Password does not match'];
    } else {
        $response = ['message' => 'Password matches'];
    }
}

header('Content-Type: application/json');
echo json_encode($response);