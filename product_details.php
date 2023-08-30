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
    <title>Product Details</title>
</head>

<body>
    <nav>
        <?php require_once "comp/navbar.php"; ?>
    </nav>
    <h1>Product Details</h1>

    <?php if ($selectedProduct) { ?>
    <?php                
        // Explode the concatenated image URLs into an array
        $imageUrls = explode(',', $selectedProduct['image_urls']);
        $mainImage = $imageUrls[0]; // First image as the main display
        $otherImages = array_slice($imageUrls, 1); // Other images for slideshow
    ?>
    <div class="product-details">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($mainImage); ?>" alt="Product Image">
        </div>
        <div class="product-slideshow">
            <?php foreach ($otherImages as $image) { ?>
            <img src="<?php echo htmlspecialchars($image); ?>" alt="Product Image" class="slideshow-image">
            <?php } ?>
        </div>
        <div class="product-info">
            <p>Name: <?php echo htmlspecialchars($selectedProduct['product_name']); ?></p>
            <p>Description: <?php echo htmlspecialchars($selectedProduct['product_description']); ?></p>
            <p>Price: <?php echo htmlspecialchars($selectedProduct['product_price']); ?></p>
            <p>Category: <?php echo htmlspecialchars($selectedProduct['category_name']); ?></p>
            <!-- Display other product data as needed -->
        </div>
    </div>
    <script>
    // JavaScript code for slideshow
    const slideshowImages = document.querySelectorAll('.slideshow-image');
    let currentSlide = 0;

    function showSlide(index) {
        slideshowImages.forEach(image => image.classList.remove('active'));
        slideshowImages[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slideshowImages.length;
        showSlide(currentSlide);
    }

    // Initial display
    showSlide(currentSlide);

    // Start slideshow interval
    setInterval(nextSlide, 3000); // Change slide every 3 seconds
    </script>
    <?php } else { ?>
    <p>Product not found.</p>
    <?php } ?>

</body>

</html>