<?php

$username = json_decode(file_get_contents('php://input'), true)['username'];


    require_once '../dbh.inc.php';
    require_once 'signup_model.inc.php';


  // Include your get_email function here

$result = get_username($pdo, $username);

if ($result) {
    $response = ['message' => 'Username already exists'];
} else {
    $response = ['message' => 'Username does not exist'];
}

header('Content-Type: application/json'); // Set JSON content type header
echo json_encode($response); // Output only the JSON response


$pdo = null;
$stmt = null;