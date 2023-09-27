<?php

require_once "inc/config_session.inc.php";
$user_id = $_SESSION["user_id"];
require_once "inc/cart/cart_view.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cart.css">
    <title>cart</title>
</head>

<body>
    <header>
        <nav>
            <?php require_once "comp/navbar.php"; ?>
        </nav>
    </header>
    <main class="cart-primary-container">
        <section class="cart-secondary-container">
            <table class="cart-table-container">
                <thead>
                    <th>

                    </th>
                </thead>
                <tbody>
                    <?php
                    foreach ($cart_by_user as $cart) {
                        $images = explode(",", $cart["image_urls"]);

                        foreach ($images as $img) {
                    ?>
                            <tr class="cart-item">
                                <td>

                                    <figure>
                                        <img src="<?php echo htmlspecialchars($img); ?>" alt="" width="100$">
                                    </figure>
                                <?php   } ?>

                                </td>
                                <td><?php echo htmlspecialchars($cart["product_name"]) ?></td>
                                <td><?php echo htmlspecialchars($cart["total_quantity"]) ?></td>
                                <td><?php echo htmlspecialchars($cart["total_price"]) ?></td>
                                <td><Button>Remove from Cart</Button></td>

                            </tr>

                        <?php
                    } ?>
                </tbody>
            </table>

        </section>
    </main>

</body>

</html>