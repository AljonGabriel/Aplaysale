<?php
require_once __DIR__ . "/admin/inc/admin.view.inc.php";
require_once "inc/ratings/rating_view.inc.php";


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
    <title>Product Details</title>
</head>

<body>
    <nav>
        <?php require_once "comp/navbar.php"; ?>
    </nav>

    <div class="product-details">
        <main>
            <div class="product-details-top-container">
                <div class="product-details-slide-show">
                    <?php
                     if ($selectedProduct) { 
                      // Explode the concatenated image URLs into an array
                      $imageUrls = explode(',', $selectedProduct['image_urls']);
                      $images = $imageUrls; // All images, including the first one
                        $slideNumber = 1;
                        foreach ($images as $image) {
                    ?>
                    <div class="product-details-img-slide-container fade">
                        <div class="numbertext"><?php echo $slideNumber++; ?> / <?php echo count($images); ?></div>
                        <img src="<?php echo htmlspecialchars($image) ?>" style="width:100%">
                    </div>
                    <?php } ?>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <script src="js/slideShow.js"></script>
                </div>
                <div class="product-details-info">
                    <h2><?php echo htmlspecialchars($selectedProduct['product_name']); ?></h2>
                    <p>Price: <?php echo htmlspecialchars($selectedProduct['product_price']); ?></p>

                    <button class="product-details-info-add-to-cart-btn">Add to Cart</button>
                    <button class="product-details-info-buy-now-btn">Buy now</button>
                </div>
            </div>

            <?php } else { ?>
            <p>Product not found.</p>
            <?php } ?>

            <div class="product-details-middle">
                <div class="product-details-description">
                    <h2>Product Description</h2>
                    <pre>Description: <?php echo htmlspecialchars($selectedProduct['product_description']); ?></pre>
                </div>
            </div>

            <div class="product-details-bottom">
                <div class="product-details-ratings-container">

                    <div class="product-details-provide-rating-container">
                        <?php
                               $alreadyRated = false;
                               foreach ($ratings as $user) {
                                   if ($_SESSION['user_id'] === $user['user_id'] && intval($_GET['product_id']) === $user['product_id']) {
                                       $alreadyRated = true;
                                       break; // Exit the loop once a matching rating is found
                                   }
                               }

                               if($alreadyRated) {
                        ?>
                        <p>Thank you for the feedback</p>


                        <?php } else {?>
                        <form action="inc/ratings/ratings_handler.inc.php?product_id=<?php echo $productId; ?>"
                            method="POST">
                            <div class="product-details-provide-rating-input-container">
                                <div class="product-details-provide-rating-header">
                                    <h3>Hows the product</h3>
                                </div>

                                <div class="product-details-provide-rating-star">
                                    <span class="star" data-rating="1">&#9733;</span>
                                    <span class="star" data-rating="2">&#9733;</span>
                                    <span class="star" data-rating="3">&#9733;</span>
                                    <span class="star" data-rating="4">&#9733;</span>
                                    <span class="star" data-rating="5">&#9733;</span>
                                    <input name="proDetPrvRatStrHdnInp" id="proDetPrvRatStrHdnInp" type="text"
                                        class="product-details-provide-rating-input" hidden>
                                </div>

                                <input name="proDetPrvRatStrInp" type="text"
                                    class="product-details-provide-rating-input"
                                    placeholder="Tell us about the product..">
                                <div class="product-details-provide-rating-submit">
                                    <button type="submit">Submit feedback</button>
                                </div>
                            </div>
                        </form>
                        <?php }?>
                    </div>
                    <h2>Product Ratings</h2>
                    <?php foreach($ratings as $rating) { ?>
                    <div class="product-details-user-rating">
                        <h3><?php echo $rating['fullname'] ?></h3>
                        <p><?php echo generateStarRating($rating['rating']); ?></p>
                        <p><?php echo $rating['review'] ?></p>
                    </div>
                    <?php } ?>
                </div>



                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const stars = document.querySelectorAll('.star');
                    const ratingHiddenInp = document.getElementById(
                        "proDetPrvRatStrHdnInp"); // Select the input field

                    stars.forEach(function(star) {
                        star.addEventListener('click', function() {
                            const rating = this.getAttribute('data-rating');
                            alert(
                                `You rated this ${rating} star(s)!`
                            ); // You can replace this with your own logic, like sending the rating to the server.
                            setActiveStars(rating);
                            // Set the value of the hidden input field
                            ratingHiddenInp.value = rating;
                        });

                        star.addEventListener('mouseenter', function() {
                            const rating = this.getAttribute('data-rating');
                            setActiveStars(rating);
                            // Set the value of the hidden input field
                            ratingHiddenInp.value = rating;
                        });
                    });

                    function setActiveStars(rating) {
                        stars.forEach(function(star) {
                            if (star.getAttribute('data-rating') <= rating) {
                                star.classList.add('active-rating');
                            } else {
                                star.classList.remove('active-rating');
                            }
                        });
                    }
                });
                </script>
            </div>
    </div>

    </main>
</body>

</html>