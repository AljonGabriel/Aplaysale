<?php

declare(strict_types = 1);


function check_email_password_match(object|bool $pdo, string $emailInput, string $pwdInput)
{
    // Define the SQL query to retrieve the hashed password for the provided email
    $query = "SELECT pwd FROM users WHERE email = :email";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);
    
    // Bind the email parameter
    $stmt->bindParam(":email", $emailInput);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Fetch the hashed password from the result
    $hashedPwd = $stmt->fetchColumn();

    // Check if a hashed password was found in the database
    if ($hashedPwd && password_verify($pwdInput, $hashedPwd)) {
        return true; // Password matches
    }

    return false; // Email or password is incorrect
}