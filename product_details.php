<?php
require 'inc/config_session.inc.php';
$page = "product_details";
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}

require_once __DIR__ . "/admin/inc/admin_view.inc.php";
require_once "inc/ratings/rating_view.inc.php";

$productId = $_GET["product_id"];


// Find the product in $productData with the matching product_id
$selectedProduct = null;
foreach ($productData as $product) {
    if ($product['product_id'] == $productId) { // Using 'product_id' key
        $selectedProduct = $product;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/product-details.css">
    <script src="js/slideshow.js" defer></script>
    <script src="js/quantityHandler.js" defer></script>
    <script src="js/addToCartHandler.js" defer></script>
    <title>Product Details</title>
</head>

<body>
    <header>
        <nav>
            <?php require_once "comp/navbar.php"; ?>
        </nav>
    </header>
    <main class="product-details-primary-container">
        <section class="product-details-secondary-container">
            <section class="product-details-carousel-container">
                <section class="product-details-carousel-img-container" data-carousel>
                    <?php
                    // Explode the concatenated image URLs into an array
                    $image_urls = explode(',', $product['image_urls']);

                    if (count($image_urls) > 1) {

                    ?>
                        <button class="product-details-carousel-button prev" data-carousel-button="prev">&#8656;</button>
                        <button class="product-details-carousel-button next" data-carousel-button="next">&#8658;</button>

                    <?php } ?>
                    <ul data-slides>
                        <?php

                        $firstImage = true; // Set this to true for the first image
                        foreach ($image_urls as $image) {
                        ?>
                            <li class="product-details-slide" <?php if ($firstImage) {
                                                                    echo 'data-active';
                                                                    $firstImage = false;
                                                                } ?>>
                                <figure>
                                    <img src="<?php echo htmlspecialchars($image); ?>" alt="">
                                </figure>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </section>
            <section class="product-details-item-title">
                <h3><?php echo htmlspecialchars($selectedProduct['product_name']) ?></h3>

                <p class="product-details-price">₱ <?php echo htmlspecialchars($selectedProduct['product_price']) ?></p>

                <form action="inc/cart/add_to_cart.inc.php" method="GET">
                    <?php if ($selectedProduct['product_stocks'] !== "Single Stock Item") { ?>
                        <section class="product-details-quantity-container">
                            <div class="product-details-quantity-count-container">
                                <button type="button" id="incrementBtn" class="product-details-quantity-count-btn">+</button>
                                <input name="prdDetQuaInp" id="prdDetQuaInp" type="number">
                                <button type="button" id="decrementBtn" class="product-details-quantity-count-btn">-</button>
                            </div>
                            <small class="product-details-stocks"><?php echo htmlspecialchars($selectedProduct['product_stocks']) ?> pieces available</small>
                        </section>

                    <?php } else { ?>
                        <section class="product-details-quantity-container">
                            <small id="prdDetStoDis" class="product-details-stocks"><?php echo htmlspecialchars($selectedProduct['product_stocks']) ?> </small>
                        </section>
                    <?php } ?>
                    <section class="product-details-cart-buy">
                        <button type="submit" class="cart-btn" name="cart">Add to Cart</button>
                        <!--  <button type="submit" class="buy-btn" name="buy">Buy </button> -->
                    </section>
                </form>
            </section>
        </section>


        <section class="product-details-secondary-container-one">
            <section class="product-details-specification-container">
                <header class="product-details-header-container">
                    <h3>Specifications</h3>
                </header>
                <hr class="product-details-hr">
                <br>
                <p>Brand: <?php echo htmlspecialchars($selectedProduct["product_brand"]); ?></p>
                <p>Shipping: <?php echo htmlspecialchars($selectedProduct["address"]); ?></p>
            </section>
            <section class="product-details-description-container">
                <header class="product-details-header-container">
                    <h3>Description</h3>
                </header>
                <hr class="product-details-hr">
                <br>
                <pre><?php echo htmlspecialchars($selectedProduct["product_description"]) ?></pre>
            </section>
        </section>


    </main>
</body>

</html>