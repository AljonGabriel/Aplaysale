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
    <!-- <link rel="stylesheet" href="styles/index.css"> -->
    <link rel="stylesheet" href="styles/general.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">


    <!-- <script src="js/slideshow.js" defer></script> -->
    <title>Aplaysale</title>
</head>

<body>
    <header>
        <nav>
            <?php require_once 'comp/navbar.php'; ?>
        </nav>
    </header>
    <main class="container-lg-fluid">

        <section class="container-lg-fluid secondary-background">
            <section id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1627384113743-6bd5a479fffd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </section>
        </section>




        <!--New product container-->
        <section class="container-lg-fluid secondary-bg py-5">
            <section class="container">
                <header class="my-5">
                    <h2 class="display-5">New Arrivals</h2>
                    <p class="lead">Discover and add our latest items to your cart now!</p>
                </header>
                <section class="row row-cols-1 row-cols-md-6 g-2">
                    <?php
                    $limit = 6; // Set the limit to 8

                    $counter = 0; // Initialize a counter variable
                    foreach ($new_products as $product) {
                        // Explode the concatenated image URLs into an array
                        $imageUrls = explode(',', $product['image_urls']);
                        if ($counter >= $limit) {
                            break; // Exit the loop if the limit is reached
                        }
                    ?>
                        <a href="<?php echo isset($_SESSION['user_id']) ? 'product_details.php?product_id=' . $product['product_id'] : 'signup.php'; ?>" class="">

                            <div class="col">
                                <div class="card border-0 overflow-hidden p-1 card-h">
                                    <figure>
                                        <img src="<?php echo htmlspecialchars($imageUrls[0]) ?>" class="card-img-top card-img-size " alt="<?php echo htmlspecialchars($prodct['product_name']) ?>">
                                        <figcaption>
                                            <div class="card-body text-center">
                                                <p class="card-title card-text"><?php echo htmlspecialchars($product['product_name']) ?></p>
                                            </div>
                                        </figcaption>


                                    </figure>

                                </div>
                            </div>

                        </a>

                    <?php
                        $counter++; // Increment the counter after displaying a product
                    }
                    ?>
                </section>
            </section>
        </section>


        <section class="container-fluid-lg my-4">
            <section class="container">
                <header class="my-5">
                    <h2 class="display-5 text-center">Explore Our Product Collection</h2>
                    <p class="lead text-center">Browse and add our latest items to your cart today!</p>
                </header>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <?php

                    foreach ($productData as $product) {

                        $images = explode(",", $product['image_urls'])

                    ?>
                        <div class="col">
                            <div class="card border-0 text-center">
                                <img src="<?php echo htmlspecialchars($images[0]) ?>" class="card-img-top card-img-size" alt="<?php echo htmlspecialchars($prodct['product_name']) ?>">
                                <div class="card-body">
                                    <h6 class="card-title card-text"><?php echo htmlspecialchars($product['product_name']) ?></h6>
                                    <a href="" class="btn btn-outline-primary w-100">Details</a>
                                </div>
                            </div>
                        </div>
                    <?php       } ?>
                </div>
            </section>

        </section>

    </main>
</body>

</html>