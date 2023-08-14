<?php
include 'signup_model.inc.php'; // Include your database connection and other functions

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Use your get_email function to check if email exists
    $result = get_email($pdo, $email);

    // Return JSON response indicating whether email exists
    echo json_encode(['exists' => !empty($result)]);
} else {
    echo json_encode(['exists' => false]);
}