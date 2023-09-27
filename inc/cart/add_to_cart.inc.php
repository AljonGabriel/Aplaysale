<?php
require_once "../config_session.inc.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "GET") {


    $user_id = $_SESSION["user_id"];

    $product_id = $_GET["product_id"];
    $quantity = $_GET["quantity"];

    require_once "../dbh.inc.php";

    require_once "cart_model.inc.php";

    add_to_cart($pdo,  $user_id,  $product_id,  $quantity);

    header("Location: ../../cart.php");
} else {
    header("Location: ../index.php");
}
