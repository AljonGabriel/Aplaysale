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
    <h1>Product Details</h1>

    <?php if ($selectedProduct) { ?>
    <?php                
    // Explode the concatenated image URLs into an array
    $imageUrls = explode(',', $selectedProduct['image_urls']);
    $images = $imageUrls; // All images, including the first one
    ?>
    <div class="product-details">
        <div class="slideshow-container">
            <?php
            $slideNumber = 1;
            foreach ($images as $image) {
            ?>
            <div class="mySlides fade">
                <div class="numbertext"><?php echo $slideNumber++; ?> / <?php echo count($images); ?></div>
                <img src="<?php echo htmlspecialchars($image) ?>" style="width:100%">
            </div>
            <?php
            }
            ?>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
        <br>

        <div style="text-align:center">
            <?php
            $dotNumber = 1;
            foreach ($images as $image) {
            ?>
            <span class="dot" onclick="currentSlide(<?php echo $dotNumber++; ?>)"></span>
            <?php
            }
            ?>
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
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
    </script>
    <?php } else { ?>
    <p>Product not found.</p>
    <?php } ?>

</body>

</html>