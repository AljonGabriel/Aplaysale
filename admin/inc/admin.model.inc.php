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

function update_user(object $pdo, string $userId, string $name, string $address, string $city, string $role, string $pwd) {

    try {
        $query = "UPDATE users SET fullname = :name, completeaddress = :address, city = :city, role = :role, pwd = :pwd WHERE id = :userId";
        $stmt = $pdo->prepare($query);

        $options = [
            'cost'=> 12,
        ];
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);

        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":address", $address);
        $stmt->bindValue(":city", $city);
        $stmt->bindValue(":role", $role);
        $stmt->bindValue(":pwd", $hashedPwd);
        $stmt->bindValue(":userId", $userId);
        $stmt->execute();
        
        // Optionally, you can return a success message or value here
    } catch (PDOException $e) {
        // Handle the exception (log, display an error message, etc.)
        echo "Error updating user: " . $e->getMessage();
        // Optionally, you can throw the exception again to propagate it
        // throw $e;
    }
    
}