<?php 

declare(strict_types=1);


function get_email( $pdo,  $email) {

    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    

    return $result;


    

}

function set_user(object $pdo, string $email, string $pwd)
{
    
    $query = "INSERT INTO users (email, pwd) VALUES ( :email, :pwd)";

    $options = [
        'cost'=> 12,
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();

}