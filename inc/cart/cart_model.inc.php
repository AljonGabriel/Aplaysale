<?php

declare(strict_types=1);

function add_to_cart(object $pdo, string $user_id, string $product_id, string $quantity)
{
    try {
        $query = "INSERT INTO cart (user_id, product_id, quantity) 
                  VALUES (:uID, :pID, :quantity)
                  ON DUPLICATE KEY UPDATE quantity = quantity + :quantity";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":uID", $user_id);
        $stmt->bindParam(":pID", $product_id);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function view_cart_by_user(object $pdo, int $user_id)
{
    $query = "SELECT
    p.product_name,
    c.total_price,
    c.total_quantity,
    GROUP_CONCAT(pi.image_url) AS image_urls
    FROM products p
    JOIN (
        SELECT
            c.product_id,
            SUM(c.quantity * pr.product_price) AS total_price,
            SUM(c.quantity) AS total_quantity
        FROM cart c
        JOIN products pr ON c.product_id = pr.id
        WHERE c.user_id = :user_id
        GROUP BY c.product_id
    ) c ON p.id = c.product_id
    LEFT JOIN product_images pi ON p.id = pi.product_id
    GROUP BY p.id, p.product_name, c.total_price, c.total_quantity;
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue("user_id", $user_id);
    $stmt->execute();

    $result = $stmt ? ($stmt->fetchAll(PDO::FETCH_ASSOC)) : [];
    return $result;
}
