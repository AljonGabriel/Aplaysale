<?php

$email = json_decode(file_get_contents('php://input'), true)['email'];


require_once '../dbh.inc.php';
require_once 'signup_contr.inc.php';
require_once 'signup_model.inc.php';



// Include your get_email function here

$result = is_email_regsitered($pdo,  $email);  /* get_email($pdo, $email); */

if ($result) {
    $response = ['message' => 'Email already exists'];
} else {
    $response = ['message' => 'Email does not exist'];
}

header('Content-Type: application/json'); // Set JSON content type header
echo json_encode($response); // Output only the JSON response


$pdo = null;
$stmt = null;
