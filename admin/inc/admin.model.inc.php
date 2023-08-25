<?php

declare(strict_types = 1);

function get_users_count(object $pdo) {

    $query = "SELECT COUNT(*) as user_count FROM users";
    $stmt = $pdo->query($query);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
     return $result['user_count'];
    
}

function get_all_users(object $pdo) {
    $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);

    if($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return [];
}

/* function update_user(object $pdo, string $userId, string $name, string $address, string $city, string $role, string $pwd) {

    $query = "UPDATE users SET fullname = :name, completeaddress = :address, city = :city, role = :role, pwd = :pwd WHERE id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":address", $address);
    $stmt->bindValue(":city", $city);
    $stmt->bindValue(":role", $role);
    $stmt->bindValue(":pwd", $pwd);
    $stmt->execute();

    
} */