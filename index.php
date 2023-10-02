<?php
$page = 'index';
require 'inc/config_session.inc.php';
require_once __DIR__ . "/admin/inc/admin_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/general.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous" defer></script>

    <script src="js/slideshow.js" defer></script>
    <title>Aplaysale</title>
</head>

<body>
    <header>
        <nav>
            <?php require_once 'comp/navbar.php'; ?>
        </nav>
    </header>
    <main class="index-primary-container">
        <section class="index-secondary-container">
            <section class="index-carousel-container">
                <section class="index-carousel-li-img-container" data-carousel>
                    <button class="index-carousel-button prev" data-carousel-button="prev">&#8656;</button>
                    <button class="index-carousel-button next" data-carousel-button="next">&#8658;</button>
                    <ul data-slides>
                        <li class="index-slides" data-active>
                            <figure>
                                <img src="https://images.unsplash.com/photo-1417733403748-83bbc7c05140?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="">
                            </figure>
                        </li>
                        <li class="index-slides">
                            <figure>
                                <img src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2076&q=80" alt="">
                            </figure>
                        </li>
                        <li class="index-slides">
                            <figure>
                                <img src="https://images.unsplash.com/photo-1579389083078-4e7018379f7e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="">
                            </figure>
                        </li>
                    </ul>
                </section>
            </section>
            <!--New product container-->
            <section class="index-new-items-container">
                <header>
                    <article class="index-products-header">
                        <h2>Newly Available</h2>
                    </article>
                </header>
                <section class="index-new-arrival-list-container">
                    <?php
                    $limit = 7; // Set the limit to 8

                    $counter = 0; // Initialize a counter variable
                    foreach ($new_products as $product) {
                        if ($counter >= $limit) {
                            break; // Exit the loop if the limit is reached
                        }
                    ?>
                        <section>
                            <a href="<?php echo isset($_SESSION['user_id']) ? 'product_details.php?product_id=' . $product['product_id'] : 'signup.php'; ?>" class="">
                                <section class="index-product-container">
                                    <figure class="index-product-image">
                                        <?php
                                        // Explode the concatenated image URLs into an array
                                        $imageUrls = explode(',', $product['image_urls']);
                                        ?>
                                        <img src="<?php echo htmlspecialchars($imageUrls[0]); ?>" alt="Product Image">
                                        <!-- Display additional images as a gallery or slideshow -->
                                        <!-- Add your gallery or slideshow HTML/JavaScript code here -->
                                    </figure>
                                    <article class="index-product-details-container">
                                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                                        <p>₱<?php echo htmlspecialchars($product['product_price']); ?></p>
                                    </article>
                                </section>
                            </a>
                        </section>
                    <?php
                        $counter++; // Increment the counter after displaying a product
                    }
                    ?>
                </section>
            </section>
        </section>

        <section class="container-lg my-4">
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php

                foreach ($productData as $product) {

                    $images = explode(",", $product['image_urls'])

                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo htmlspecialchars($images[0]) ?>" class="card-img-top card-products-size" alt="<?php echo htmlspecialchars($prodct['product_name']) ?>">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo htmlspecialchars($product['product_name']) ?></h6>
                                <a href="" class="btn btn-primary w-100">Buy</a>

                            </div>
                        </div>
                    </div>
                <?php       } ?>
            </div>
        </section>

    </main>
</body>

</html>