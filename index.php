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


                    <?php foreach($productData as $product) {?>
                    <div class="home-product-container">
                        <div class="home-product-image">
                            <img src="<?php echo htmlspecialchars($product['image_url']) ?> " alt="">
                        </div>
                        <div class="home-product-name">
                            <h2><?php echo htmlspecialchars($product['product_name']) ?></h2>
                        </div>
                        <div class="home-product-price">
                            <p>₱<?php echo htmlspecialchars($product['product_price']) ?></p>
                        </div>
                        <div class="home-product-buy">
                            <a href="product_details.php?product_id=<?php echo $product['id']; ?>" class="">Add to
                                cart</a>
                        </div>
                    </div>
                    <?php } ?>

                </div>


            </div>
        </div>
    </main>
</body>


</html>