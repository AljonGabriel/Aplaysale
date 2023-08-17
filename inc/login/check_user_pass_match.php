<?php

$email = json_decode(file_get_contents('php://input'), true)['email'];// Decode the JSON data
$password = json_decode(file_get_contents('php://input'), true)['password']; // Decode the JSON data



require_once '../dbh.inc.php';
require_once 'login_model.inc.php';
require_once 'login_contr.inc.php';

$result = is_user_match($pdo, $email, $password); // Check if user credentials match

if ($result) {
    $response = ['message' => 'User Exist'];
} else {
    $response = ['message' => 'Wrong Credentials'];
}

header('Content-Type: application/json');
echo json_encode($response);