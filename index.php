<?php

require 'inc/config_session.inc.php';
$page = 'index';
require_once __DIR__ . "/admin/inc/admin.view.inc.php";
require_once "inc/ratings/rating_view.inc.php";

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

    <div class="home">
        <main>
            <div class="home-slideshow-container">
                <div class="home-slideshow-img-container slide-fade">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="">
                </div>
                <div class="home-slideshow-img-container">
                    <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="">
                </div>
            </div>
            <!--New product container-->
            <div class="home-new-items-container">
                <div class="home-products-header">
                    <h2>New Arrivals</h2>
                </div>
                <br>
                <div class="home-new-arrival-list-container">
                    <?php
                    $displayedProducts = 0; // Initialize a counter variable

                    foreach ($productData as $product) {
                        if (isset($_SESSION["user_id"])) {
                            if ($displayedProducts >= 8) {
                                // Break the loop if 3 products have been displayed
                                break;
                            }
                    ?>
                            <a href="product_details.php?product_id=<?php echo $product['product_id']; ?>" class="">
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
                                    <div class="home-product-details-container">
                                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                                        <p>₱<?php echo htmlspecialchars($product['product_price']); ?></p>
                                        <?php
                                        // Retrieve and display ratings for this product

                                        $productRatings = get_product_rating_by_id($pdo, $product['product_id']);
                                        foreach ($productRatings as $rating) {
                                        ?>
                                            <div class="product-details-user-rating">
                                                <p class="starred"><?php echo generateStarRating($rating['rating']); ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </a>
                        <?php
                            $displayedProducts++; // Increment the counter after displaying a product
                        } else {
                        ?>
                            <a href="signup.php" class="">
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
                                    <div class="home-product-details-container">
                                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                                        <p>₱<?php echo htmlspecialchars($product['product_price']); ?></p>
                                        <?php
                                        // Retrieve and display ratings for this product

                                        $productRatings = get_product_rating_by_id($pdo, $product['product_id']);
                                        foreach ($productRatings as $rating) {
                                        ?>
                                            <div class="product-details-user-rating">
                                                <p class="starred"><?php echo generateStarRating($rating['rating']); ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </a>

                    <?php
                        }
                    }

                    ?>


                </div>
            </div>
        </main>
    </div>
</body>
<script>
    // JavaScript to handle the automatic slideshow
    let slideIndex = 0;
    const slides = document.querySelectorAll(".home-slideshow-img-container");

    function showSlides() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slideIndex++;

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 5000); // Change image every 5 seconds (adjust as needed)
    }

    showSlides(); // Start the slideshow
</script>

</html>