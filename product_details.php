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

            <div class="product-details-middle">
                <div class="product-details-description">
                    <h2>Product Description</h2>
                    <pre>Description: <?php echo htmlspecialchars($selectedProduct['product_description']); ?></pre>
                </div>
            </div>

            <div class="product-details-bottom">
                <div class="product-details-ratings-container">
                    <h2>User ratings</h2>
                    <div class="product-details-user-rating">
                        <h3>Example-User</h3>
                        <p>Example Ratings Description</p>
                        <div class="rating">
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php } else { ?>
    <p>Product not found.</p>
    <?php } ?>
    </main>
</body>

</html>