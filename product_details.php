<?php
require 'inc/config_session.inc.php';
$page = "product_details";
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
$productId = $_GET["product_id"];
require_once __DIR__ . "/admin/inc/admin_view.inc.php";
require_once "inc/ratings/rating_view.inc.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- <script src="js/slideshow.js" defer></script> -->
    <script src="js/quantityHandler.js" defer></script>
    <script src="js/addToCartHandler.js" defer></script>
    <title>Product Details</title>
</head>

<body>
    <header>
        <?php require_once "comp/navbar.php"; ?>
    </header>
    <main class="container-lg-fluid mt-5">
        <section class="container">

            <div id="carouselExample" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <?php
                    $isFirstImage = true; // Variable to track the first image
                    foreach ($product_by_id as $product) {
                        $img_urls = explode(",", $product['image_urls']);
                        foreach ($img_urls as $imgs) {
                            // Check if it's the first image, add "active" class if true
                            $activeClass = $isFirstImage ? "active" : "";
                    ?>
                            <div class="carousel-item <?php echo $activeClass; ?>">
                                <img src="<?php echo htmlspecialchars($imgs); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                            </div>
                    <?php
                            $isFirstImage = false; // Set to false after the first image
                        }
                    } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <article class="text-center my-3">
                <h6 class="display-4 "><?php echo htmlspecialchars($product['product_name']) ?></h6>
            </article>

        </section>
        <section class="container-lg-fluid bg-body-tertiary p-3">
            <section class="container">

                <div class="d-flex justify-content-center align-items-center gap-3">
                    <form action="" class="d-flex align-items-center">
                        <div class="input-group flex-nowrap">
                            <button class="btn btn-outline-primary">Add to Cart</button>
                            <a href="#" class="btn btn-primary">Check Out</a>
                        </div>
                        <label for="prdDetQuaInp">Quantity</label>
                        <div class="input-group">
                            <button id="incrementBtn" type="button" class="btn">+</button>
                            <input id="prdDetQuaInp" type="number" class="form-control">
                            <button id="decrementBtn" type="button" class="btn">-</button>
                        </div>

                    </form>
                    <small class="product-details-stocks">Remaining Stocks <?php echo htmlspecialchars($product['product_stocks']) ?></small>
                </div>
            </section>
        </section>

        <section class="container-lg-fluid bg-body-tertiary p-3">
            <section class="container">
                <pre style=" white-space: pre-wrap;"><?php echo htmlspecialchars($product['product_description']) ?></pre>
            </section>
        </section>
    </main>

</body>

</html>