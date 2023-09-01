<?php
require_once __DIR__ . "/admin/inc/admin.view.inc.php";
$productId = $_GET['product_id']; // Retrieve product_id from the URL

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
                        <form action="" method="">
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
                                    <input id="proDetPrvRatStrHdnInp" type="text"
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
                    </div>
                    <h2>Product Ratings</h2>
                    <div class="product-details-user-rating">
                        <h3>Example-User</h3>
                        <p>Example Ratings Description</p>
                    </div>
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const stars = document.querySelectorAll('.star');

                    stars.forEach(function(star) {
                        star.addEventListener('click', function() {
                            const rating = this.getAttribute('data-rating');
                            alert(
                                `You rated this ${rating} star(s)!`
                            ); // You can replace this with your own logic, like sending the rating to the server.
                            setActiveStars(rating);
                        });

                        star.addEventListener('mouseenter', function() {
                            const rating = this.getAttribute('data-rating');
                            const ratingHiddenInp = document.getElementById(
                                "proDetPrvRatStrHdnInp")
                            ratingHiddenInp.innerHTML = rating
                            console.log(ratingHiddenInp);
                            setActiveStars(rating);
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