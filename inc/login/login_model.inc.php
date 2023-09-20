<?php

declare(strict_types=1);


function get_user_row(object $pdo, string $emailInput)
{
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $emailInput);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($result) {
        // User exists, return the user data

        return array('exists' => true, 'user' => $result);
    } else {
        // User does not exist
        return array('exists' => false);
    }
}
