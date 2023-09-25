<?php

declare(strict_types=1);

/* function add_rating(object $pdo, string $user_id, string $prod_id, string $rating, string $review)
{

    try {
        $query = "INSERT INTO ratings(user_id, product_id, rating, review) VALUES (:user_id, :prod_id, :rating, :review);";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":user_id", $user_id);
        $stmt->bindValue(":prod_id", $prod_id);
        $stmt->bindValue(":rating", $rating);
        $stmt->bindValue(":review", $review);
        $stmt->execute();

        if ($stmt) {
            echo "User inserted successfully";
        } else {
            echo "failed";
        }
    } catch (PDOException $e) {
        echo $e;
    }
} */

function get_product_rating_by_id(object $pdo, string $product_id)
{
    try {

        $query = "SELECT r.*, u.fullname FROM ratings r
              JOIN users u ON r.user_id = u.id
              WHERE r.product_id = :product_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e;
    }
}


/* function get_all_product_rating(object $pdo)
{
    try {

        $query = "SELECT r.*, u.fullname FROM ratings r
              JOIN users u ON r.user_id = u.id;";
        $stmt = $pdo->query($query);


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e;
    }
} */

function generateStarRating($rating)
{
    $ratingHTML = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $ratingHTML .= '<span class="starred">&#9733;</span>'; // Full star for ratings >= $i
        } else {
            $ratingHTML .= '<span class="starred">&#9734;</span>'; // Empty star for ratings < $i
        }
    }
    return $ratingHTML;
}
