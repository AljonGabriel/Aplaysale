<?php 
require 'inc/config_session.inc.php';
require_once __DIR__ . "/admin/inc/admin.view.inc.php";
$page = 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Aplaysale</title>
</head>

<body>
    <nav>
        <?php require_once 'comp/navbar.php'; ?>
    </nav>
    <main>
        <div class="home">
            <div class="home-container">
                <div class="home-products-header">
                    <h2>Check our new products </h2>
                </div>



                <div class="home-new-items-container">
                    <?php foreach ($productData as $product) { ?>
                    <div class="home-product-container">
                        <div class="home-product-image">
                            <?php
                // Explode the concatenated image URLs into an array
                $imageUrls = explode(',', $product['image_urls']);
                ?>
                            <img src="<?php echo htmlspecialchars($imageUrls[0]); ?>" alt="Product Image">
                            <!-- Display additional images as a gallery or slideshow -->
                            <!-- Add your gallery or slideshow HTML/JavaScript code here -->
                        </div>
                        <div class="home-product-name">
                            <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                        </div>
                        <div class="home-product-price">
                            <p>₱<?php echo htmlspecialchars($product['product_price']); ?></p>
                        </div>
                        <div class="home-product-buy">
                            <?php if (isset($_SESSION["user_id"])) { ?>
                            <a href="product_details.php?product_id=<?php echo $product['product_id']; ?>" class="">Add
                                to cart</a>
                            <?php } else { ?>
                            <a href="signup.php" class="">Add to cart</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>



            </div>
        </div>
    </main>
</body>


</html>